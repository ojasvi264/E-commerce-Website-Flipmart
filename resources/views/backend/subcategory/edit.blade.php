@extends('layouts.backend')
@section('title','SubCategory Create page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            SubCategory Management
            <a href="{{route('subcategory.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Create
            </a>
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
                <h3 class="box-title">Title</h3>

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
                @include('includes.error')
                <form action="{{route('subcategory.update',$data['subcategory']->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT"/>
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category Id</label>
                        <input type="text" name="category_id" class="form-control" id="category_id" value="{{$data['subcategory']->category_id}}"/>
                        @include('includes.single_field_validation',['field'=>'category_id'])
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$data['subcategory']->name}}"/>
                        @include('includes.single_field_validation',['field'=>'name'])
                    </div>

                    <div class="form-group">
                        <label for="rank">Rank</label>
                        <input type="text" name="rank" class="form-control" id="rank" value="{{$data['subcategory']->rank}}"/>
                        @include('includes.single_field_validation',['field'=>'rank'])
                    </div>


                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$data['subcategory']->slug}}"/>
                        @include('includes.single_field_validation',['field'=>'slug'])
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label><br>
                        @if($data['subcategory']->status==1)
                            <input type="radio" name="status"  id="name" value="1" checked/>Active
                            <input type="radio" name="status"  id="name" value="0"  />Inactive
                        @else
                            <input type="radio" name="status"  id="name" value="1" />Active
                            <input type="radio" name="status"  id="name" value="0" checked />Inactive
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="meta_keyword">Meta_keyword</label>
                        <textarea name="meta_keyword" class="form-control" id="meta_keyword" cols="30"rows="3">{{$data['subcategory']->meta_keyword}}</textarea>
                        @include('includes.single_field_validation',['field'=>'meta_keyword'])
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta_description</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" cols="30"rows="3">{{$data['subcategory']->meta_description}}</textarea>
                        @include('includes.single_field_validation',['field'=>'meta_description'])
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="Update SubCategory"><i class="fa fa-save"></i>Update SubCategory</button>
                        <button type="submit" class="btn btn-danger" value="Clear"><i class="fa fa-recycle"></i>Cancel</button>
                    </div>
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