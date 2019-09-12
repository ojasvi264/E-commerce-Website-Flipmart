<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Category;
use App\Model\Configuration;
use App\Model\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    function  forgot(){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();

        return view('frontend.customer.forgot',compact('data'));
    }

    function  sendforgotemail(Request $request){
        $this->validate($request, ['email' => 'required|email']);
        $customer = Customer::where('email',$request->input('email'))->get();
//        dd($customer)
        if(count($customer) == 1){
            $customer[0]->reset_token = uniqid();
            $customer[0]->update();
            $customer = $customer[0];
            $link = url('/') . '/customer/reset/' . $customer->reset_token;
            /*Mail::to($request->input('email'))
                ->send(new ForgotEmail($request));*/
            Mail::send('frontend.customer.forgotemail_format', ['name' =>$customer->name,'email' => $request->input('email'),'link' => $link], function ($m) use ($customer,$link) {
                $m->from('info@test.com', 'Your Passwrd Reset Link');
                $m->to($customer->email, $customer->name)->subject('Your Password Reset Link!');
            });
            $request->session()->flash('success_message','Reset link sent into email,please check your email!!');
            return redirect()->back();
        }else{
            $request->session()->flash('error_message','Customer email not match!!');
            return redirect()->back();
        }
    }


    function  reset(Request $request,$code){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();

        $customer = Customer::where('reset_token',$code)->get();

        if (count($customer) == 1){
            return view('frontend.customer.reset',compact('code','data'));
        } else {
            $request->session()->flash('error_message','Invalid Reset Token!!');
            return redirect()->back();
        }

    }

    function resetpassword(Request $request){
//        dd($request);
        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);

        $customer = Customer::where('reset_token',$request->input('reset_code'))->get();
        if(count($customer) == 1){
            $customer[0]->reset_token = '';
            $customer[0]->password = bcrypt($request->input('password'));
            $customer[0]->update();
            $request->session()->flash('success_message','Your password has been changed, Please login to continue');
            return redirect()->route('customer.auth.login');
        }else{
            $request->session()->flash('error_message','Password Update Failed!!');
            return redirect()->back();
        }
    }


}