<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all dta from tag model
        $data['categories']=Category::all();
        //send to view using compact method
        return view('backend.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        //dd($request->all());
        $category=Category::create($request->all());
        if ($category) {
            $request->session()->flash('success_message', 'Category created Successfully');
            return redirect()->route('category.index');

        }else{
            $request->session()->flash('error_message','Category created Failed');
            return redirect()->route('category.create');

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
        $data['category']=Category::find($id);
        return view('backend.category.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category']=Category::find($id);
        return view('backend.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        //dd($request->all());
        $category=Category::find($id);
        if ($category->update($request->all())) {
            $request->session()->flash('success_message', 'Category Updated Successfully');


        }else{
            $request->session()->flash('error_message','Category updated Failed');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $category=Category::find($id);
        if ($category->delete()) {
            $request->session()->flash('success_message', 'Category Deleted Successfully');

        }else{
            $request->session()->flash('error_message','Category Deleted Failed');
        }
        return redirect()->route('category.index');
    }
    function subcategory()
    {
        $category = Category::find($_POST['cid']);
        $ht = '';
        foreach ($category->subcategories as $subcategory) {
            $ht .= "<option value='$subcategory->id'>$subcategory->name</option>";
        }
        return $ht;
    }
}
