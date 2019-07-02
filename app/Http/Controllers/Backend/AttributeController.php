<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AttributeRequest;
use App\Model\Attribute;
use App\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data['attribute']=Attribute::find($id);
        return view('backend.attribute.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, $id)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        //dd($request->all());
        $attribute=Attribute::find($id);
        if ($attribute->update($request->all())) {
            $request->session()->flash('success_message', 'Attribute Updated Successfully');

        }else{
            $request->session()->flash('error_message','Attribute Updated Failed');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $attribute=Attribute::find($id);
        if ($attribute->delete()) {
            $request->session()->flash('success_message', 'Attribute Deleted Successfully');

        }else{
            $request->session()->flash('error_message','Attribute Deleted Failed');
        }
        return redirect()->route('product.index');
    }
}
