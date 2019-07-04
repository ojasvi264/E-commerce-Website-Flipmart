<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    function index(){
        $data =[];
        return view('frontend.front.index',compact('data'));
    }
}
