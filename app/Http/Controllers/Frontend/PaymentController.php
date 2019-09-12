<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Order;
use App\Model\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }

    public function payWithpaypal(Request $request)
    {


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_list = new ItemList();
        $it = [];
        for ($i = 1;$i<= $request->input('total_num_item');$i++){
            $ar = 'item_' . $i;
            $ar = new Item();
            $ar->setName($request->get('item_name_' . $i)) /** item name **/
            ->setCurrency('USD')
                ->setQuantity($request->get('item_quantity_' . $i))
                ->setPrice($request->get('item_price_' . $i)); /** unit price **/
            array_push($it,$ar);
        }
        $item_list->setItems($it);

//        dd($item_list);
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->input('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('paypal.paymentstatus'))->setCancelUrl(URL::route('customer.checkout'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {

            if (Config::get('app.debug')) {

                Session::put('error', 'Connection timeout');
                return Redirect::route('customer.checkout');

            } else {

                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('customer.checkout');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

//        dd($payment->getId());
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
//        dd(Session::get('paypal_payment_id'));
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

//        dd('test');


        Session::put('error', 'Unknown error occurred');
        return Redirect::route('customer.checkout');

    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
//dd($payment_id);
        /** clear the session payment ID **/
//        Session::forget('paypal_payment_id');
        if (
            empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            Session::put('error_message', 'Payment failed');
            return Redirect::route('customer.checkout');

        }
        $payment = Payment::get($payment_id, $this->_api_context);
//        dd($payment);
        $execution = new PaymentExecution();


        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
//        dd($this->_api_context);
        $result = $payment->execute($execution, $this->_api_context);
//        dd($result);
        if ($result->getState() == 'approved') {

            $order = Order::create([
                'customer_id' => Auth::guard('customer')->user()->id,
                'payment_key' => $payment_id,
                'payment_mode' => 'paypal',
                'order_date' => date('Y-m-d H:i:s'),
                'order_status' => 'Order Placed',
                'total_amount' => Cart::total(),
//                'status'=>1,
            ]);
            if ($order){
                $order_details['order_id'] = $order->id;
                foreach (Cart::content() as $cart){
                    $order_details['product_id'] = $cart->id;
                    $order_details['quantity'] = $cart->qty;
                    $order_details['price'] = $cart->price;
                    $attribute = '';
                    foreach ($cart->options as $key => $value){
                        $attribute .= $key . ':' . $value. ',';
                    }
                    $order_details['description'] = $attribute;
                    OrderDetail::create($order_details);
                }
                Session::put('success_message', 'Order Placed, your product will be deliver soon.');

            }else{
                Session::put('error_message', 'Payment success but order placement failed, contact us for further process');
            }
            Session::put('success_messsage', 'Payment success new test');
            return Redirect::route('customer.checkout');

//            return Redirect::route('paypal.successpayment');

        }

        Session::put('error_message', 'Payment failed');
        return Redirect::route('customer.checkout');

    }

//    function  successpayment(){
//        dd($payment_id = Session::get('paypal_payment_id'));
//    }
}