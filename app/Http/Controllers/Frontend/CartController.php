<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Category;
use App\Model\Configuration;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    function  add(Request $request){
        $data  = [
            'id' => $request->input('product_id'),
            'name' => $request->input('product_name'),
            'qty' => $request->input('qty'),
            'price' => $request->input('product_price'),
            'weight' => 1,
            'options' => $request->input('attribute')
        ];
        $status = Cart::add($data);
        if ($status){
            $request->session()->flash('success_message','Product added into cart successfully');
        }else{
            $request->session()->flash('error_message','Add to cart failed');
        }
        return redirect()->route('frontend.product',$request->input('product_slug'));
    }

    function  index(){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();
        $data['carts'] = Cart::content();
        return view('frontend.cart.index',compact('data'));
    }

    public function destroy(Request $request,$id)
    {
        if (Cart::remove($id)) {
            $request->session()->flash('success_message', 'Cart item Deleted Successfully');

        }else{
            $request->session()->flash('error_message','Cart item Deleted Failed');
        }
        return redirect()->route('frontend.cart.index');
    }
}
