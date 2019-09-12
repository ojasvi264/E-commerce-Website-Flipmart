<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Product_LineRequest;
use App\Model\Category;
use App\Model\Product;
use App\Model\Product_Line;
use App\Model\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Product_LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product_lines']=Product_Line::all();
        //send to view using compact method
        return view('backend.product_line.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name','id');
        $data['subcategories'] = SubCategory::pluck('name','id');
        return view('backend.product_line.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product_LineRequest $request)
    {
        $request->request->add(['created_by' => Auth::user()->id]);
        //dd($request->all());
        $product_line = Product_Line::create($request->all());
        if ($product_line) {
            $request->session()->flash('success_message', 'Product Line created Successfully');
            return redirect()->route('product_line.index');

        } else {
            $request->session()->flash('error_message', 'Product Line created Failed');
            return redirect()->route('product_line.create');
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
        $data['product_line']=Product_Line::find($id);
        return view('backend.product_line.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product_line']=Product_Line::find($id);
        $data['categories'] = Category::pluck('name','id');
        $data['subcategories'] = SubCategory::pluck('name','id');
        return view('backend.product_line.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product_LineRequest $request, $id)
    {
        $request->request->add(['updated_by'=>Auth::user()->id]);
        //dd($request->all());
        $product_line=Product_Line::find($id);
        if ($product_line->update($request->all())) {
            $request->session()->flash('success_message', 'Product Line Updated Successfully');


        }else{
            $request->session()->flash('error_message','Product Line updated Failed');
        }
        return redirect()->route('product_line.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $product_line=Product_Line::find($id);
        if ($product_line->delete()) {
            $request->session()->flash('success_message', 'Product_Line Deleted Successfully');

        }else{
            $request->session()->flash('error_message','Product_Line Deleted Failed');
        }
        return redirect()->route('product_line.index');
    }
}
