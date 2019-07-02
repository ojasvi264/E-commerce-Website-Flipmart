@extends('layouts.backend')
@section('title','Role Create page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Role Management
            <a href="{{route('role.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Create
            </a>
            <a href="{{route('role.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i>
                List
            </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Role</a></li>
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
                <form action="{{route('role.update',$data['role']->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT"/>
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$data['role']->name}}"/>
                        @include('includes.single_field_validation',['field'=>'name'])
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label><br>
                        @if($data['role']->status==1)
                            <input type="radio" name="status"  id="name" value="1" checked/>Active
                            <input type="radio" name="status"  id="name" value="0" />Inactive
                        @else
                            <input type="radio" name="status"  id="name" value="1"/>Active
                            <input type="radio" name="status"  id="name" value="0" checked />Inactive
                         @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="Update Role"><i class="fa fa-save"></i>Update Role</button>
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