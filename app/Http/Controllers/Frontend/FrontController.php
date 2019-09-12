<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Category;
use App\Model\Configuration;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Product_Line;
use App\Model\Slider;
use App\Model\SubCategory;

class FrontController extends Controller
{
    function index(){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();
        $data['top_categories'] = Category::where('status',1)->orderby('rank')->limit(5)->get();
        $data['sliders'] = Slider::where('status',1)->limit(5)->get();
        $data['latest_products'] = Product::where('status',1)->orderby('created_at','desc')->limit(10)->get();
        return view('frontend.front.index',compact('data'));
    }

    function  category($slug){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();
        $data['category'] = Category::where('slug',$slug)->get();
        $data['products'] = Product::where('category_id',$data['category'][0]->id)->where('status',1)->paginate(4);
        return view('frontend.front.category',compact('data'));

    }

    function  subcategory($slug){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();
        $data['subcategory'] = SubCategory::where('slug',$slug)->get();
        $data['category'] = Category::find($data['subcategory'][0]->category_id);
        $data['products'] = Product::where('subcategory_id',$data['subcategory'][0]->id)->where('status',1)->paginate(4);
        return view('frontend.front.subcategory',compact('data'));
    }

    function  product_line($slug){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();
        $data['product_line'] = Product_Line::where('slug',$slug)->get();
        $data['category'] = Category::find($data['product_line'][0]->category_id);
        $data['subcategory'] = SubCategory::find($data['product_line'][0]->subcategory_id);
        $data['products'] = Product::where('product_line_id',$data['product_line'][0]->id)->where('status',1)->paginate(4);
        return view('frontend.front.product_line',compact('data'));
    }

    function  product($slug){
        $data = [];
        $data['configurations'] = Configuration::first();
        $data['categories'] = Category::where('status',1)->orderby('rank')->get();
        $data['product'] = Product::where('slug',$slug)->get();

        return view('frontend.front.product',compact('data'));
    }
}
