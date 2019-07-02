@extends('layouts.backend')
@section('title','SubCategory Create page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SubCategory Management
            <a href="{{route('subcategory.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i>
                List
            </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">SubCategory</a></li>
            <li class="active">Create page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create SubCategory</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @include('includes.flash')

                <form action="{{route('subcategory.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category id</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($data['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @include('includes.single_field_validation',['field'=>'category_id'])
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"/>
                        @include('includes.single_field_validation',['field'=>'name'])
                    </div>

                    <div class="form-group">
                        <label for="rank">Rank</label>
                        <input type="text" name="rank" class="form-control" id="rank"/>
                        @include('includes.single_field_validation',['field'=>'rank'])
                    </div>


                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug"/>
                        @include('includes.single_field_validation',['field'=>'slug'])
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <input type="radio" name="status"  id="name" value="1" />Active
                        <input type="radio" name="status"  id="name" value="0" checked />Inactive
                    </div>

                    <div class="form-group">
                        <label for="meta_keyword">Meta_keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30"rows="3"></textarea>
                        @include('includes.single_field_validation',['field'=>'meta_keyword'])
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta_description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30"rows="3"></textarea>
                        @include('includes.single_field_validation',['field'=>'meta_description'])
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="Save SubCategory"><i class="fa fa-save"></i>Save SubCategory</button>
                        <button type="submit" class="btn btn-danger" value="Clear"><i class="fa fa-recycle"></i>Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection