@extends('layouts.backend')
@section('title','Permission Create page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Permission Management
            <a href="{{route('permission.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i>
                List
            </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Permission</a></li>
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
                <form action="{{route('permission.store')}}" method="post">
                    @csrf
                    @include('backend.permission.mainform')
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"   value="Save Module"><i class="fa fa-save"></i>Save Module</button>
                        <button type="submit" class="btn btn-danger"   value="Clear"><i class="fa fa-recycle"></i>Cancel</button>
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