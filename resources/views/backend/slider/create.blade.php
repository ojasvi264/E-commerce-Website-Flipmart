@extends('layouts.backend')
@section('title','Slider Create page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Slider Management
            <a href="{{route('slider.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i>
                List
            </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Slider</a></li>
            <li class="active">Create page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Slider</h3>

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
                <form action="{{route('slider.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image"/>
                        @include('includes.single_field_validation',['field'=>'image'])
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="string" name="title" class="form-control" id="title"/>
                        @include('includes.single_field_validation',['field'=>'title'])
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="30"rows="3"></textarea>
                        @include('includes.single_field_validation',['field'=>'description'])
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <input type="radio" name="status"  id="name" value="1" />Active
                        <input type="radio" name="status"  id="name" value="0" checked />Inactive
                    </div>


                    <div class="form-group">
                        <label for="link">Link</label>
                        <textarea name="link" class="form-control" id="link" cols="30"rows="3"></textarea>
                        @include('includes.single_field_validation',['field'=>'link'])
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="Save Slider"><i class="fa fa-save"></i>Save Slider</button>
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