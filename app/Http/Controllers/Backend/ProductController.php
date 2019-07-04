<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProductRequest;
use App\Model\Attribute;
use App\Model\Category;
use App\Model\Image;
use App\Model\Product;
use App\Model\SubCategory;
use App\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all dta from tag model
        $data['products']=Product::all();
        //send to view using compact method
        return view('backend.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=Category::all();
        $data['subcategories']=SubCategory::all();
        $data['tags']=Tag::all();
        return view('backend.product.create',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        $request->request->add(['stock'=>$request->input('quantity')]);
        //dd($request->all());
        $product=Product::create($request->all());
        if ($product) {
            $attribute_data['product_id']=$product->id;
            $attribute_name=$request->input('attribute_name');
            $attribute_value=$request->input('attribute_value');
            for ($i=0; $i<count($attribute_name); $i++){
                $attribute_data['name']=$attribute_name[$i];
                $attribute_data['value']=$attribute_value[$i];
                Attribute::create($attribute_data);
            }
            $product_image=$request->file('product_image');
            $image_data['product_id']=$product->id;
            for ($i=0; $i<count($product_image); $i++){
                $file=$product_image[$i];
                $image_data['image']=uniqid().'.'.$file->getClientOriginalExtension();
                $destinationPath=public_path('/images/product');
                $file->move($destinationPath,$image_data['image']);
                Image::create($image_data);
            }
            $product->tags()->attach($request->input('tag_id'));

            $request->session()->flash('success_message', 'Product created Successfully');
            return redirect()->route('product.index');

        }else{
            $request->session()->flash('error_message','Product created Failed');
            return redirect()->route('product.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product']=Product::find($id);
        return view('backend.product.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories']=Category::all();
        $data['subcategories']=SubCategory::all();
        $data['product']=Product::find($id);
        return view('backend.product.edit',compact('data'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $product=Product::find($id);
        if ($product->delete()) {
            $request->session()->flash('success_message', 'Product Deleted Successfully');

        }else{
            $request->session()->flash('error_message','Product Deleted Failed');
        }
        return redirect()->route('product.index');
    }
}
