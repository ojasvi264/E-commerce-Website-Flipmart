@extends('layouts.backend')
@section('title','User Create page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Management
            <a href="{{route('user.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i>
                List
            </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
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
                <form action="{{route('user.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="role_id">Role Id</label>
                        <select name="role_id" class="form-control">
                            <option value="">Select Role</option>
                            @foreach($data['users'] as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @include('includes.single_field_validation',['field'=>'role_id'])
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="string" name="name" class="form-control" id="name"/>
                        @include('includes.single_field_validation',['field'=>'name'])
                    </div>

                    <div class="form-group">
                        <label for="route">Email</label>
                        <input type="email" name="email" class="form-control" id="email"/>
                        @include('includes.single_field_validation',['field'=>'email'])
                    </div>

                    <div class="form-group">
                        <label for="route">Password</label>
                        <input type="text" name="password" class="form-control" id="password"/>
                        @include('includes.single_field_validation',['field'=>'password'])
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="Save User"><i class="fa fa-save"></i>Save User</button>
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