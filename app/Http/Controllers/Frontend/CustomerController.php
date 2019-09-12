<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Category;
use App\Model\Configuration;
use App\Model\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer',['only' => 'index','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();

        return view('frontend.customer.dashboard',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();
        return view('frontend.customer.register', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $request->request->add(['verification_key'],uniqid());
        // validate the data
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'password'      => 'required'
        ]);
        // store in the database
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->username = $request->username;
        $customer->password=bcrypt($request->password);
        //$customer->confirm_password = $request->confirm_password;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->shipping_address = $request->shipping_address;
        $customer->verification_key = uniqid();
        $customer->status = 1;
        $customer->save();
        return redirect()->route('customer.auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function checkout(){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();
        $data['carts'] = Cart::content();
        return view('frontend.customer.checkout',compact('data'));
    }
}
