<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\TagRequest;
use App\Model\Category;
use App\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all dta from tag model
        $data['tags']=Tag::all();
        //send to view using compact method
        return view('backend.tag.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

        $request->request->add(['created_by'=>Auth::user()->id]);
        //dd($request->all());
        $tag=Tag::create($request->all());
        if ($tag) {
            $request->session()->flash('success_message', 'Tag created Successfully');
            return redirect()->route('tag.index');

        }else{
                $request->session()->flash('error_message','Tag created Failed');
                return redirect()->route('tag.create');

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
        $data['tag']=Tag::find($id);
        return view('backend.tag.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['tag']=Tag::find($id);
        return view('backend.tag.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        //dd($request->all());
        $tag=Tag::find($id);
        if ($tag->update($request->all())) {
            $request->session()->flash('success_message', 'Tag Updated Successfully');


        }else{
            $request->session()->flash('error_message','Tag updated Failed');
        }
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $tag=Tag::find($id);
        if ($tag->delete()) {
            $request->session()->flash('success_message', 'Tag Deleted Successfully');

        }else{
            $request->session()->flash('error_message','Tag Deleted Failed');
        }
        return redirect()->route('tag.index');
    }
}
