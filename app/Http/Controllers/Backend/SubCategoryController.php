<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\SubCategoryRequest;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subcategories']=SubCategory::all();
        return view('backend.subcategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=Category::all();
        return view('backend.subcategory.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        $subcategory=SubCategory::create($request->all());
        if ($subcategory){
            $request->session()->flash('success_message','SubCategory created successfully');
            return redirect()->route('subcategory.index');
        }else{
            $request->session()->flash('error_message','SubCategory created Failed');
            return redirect()->route('subcategory.create');


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
        $data['subcategory']=SubCategory::find($id);
        return view('backend.subcategory.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['subcategory']=SubCategory::find($id);
        return view('backend.subcategory.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, $id)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        //dd($request->all());
        $subcategory=SubCategory::find($id);
        if ($subcategory->update($request->all())) {
            $request->session()->flash('success_message', 'SubCategory Updated Successfully');

        }else{
            $request->session()->flash('error_message','SubCategory Updated Failed');
        }
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $subcategory=SubCategory::find($id);
        if ($subcategory->delete()) {
            $request->session()->flash('success_message', 'SunCategory Deleted Successfully');

        }else{
            $request->session()->flash('error_message','SunCategory Deleted Failed');
        }
        return redirect()->route('subcategory.index');
    }
}
