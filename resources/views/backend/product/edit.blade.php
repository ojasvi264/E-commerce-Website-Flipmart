@extends('layouts.backend')
@section('title','Product Create page')
@section('js')
    @include('backend.product.Include.add_row')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#category_id').change(function(){
                category_id = $(this).val();
                path="{{route('category.subcategory')}}";
                $.ajax({
                    url: path,
                    data: {'cid' :category_id},
                    method: 'post',
                    datatype: 'text',
                    success: function (response) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append(response);

                    }
                });
            });

        });
    </script>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product Management
            <a href="{{route('product.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Create
            </a>
            <a href="{{route('product.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i>
                List
            </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
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
                <form action="{{route('product.update',$data['product']->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT"/>
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($data['categories'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @include('includes.single_field_validation',['field'=>'category_name'])
                    </div>
                    <div class="form-group">
                        <label for="name">SubCategory Name</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                            <option value="">Select SubCategory</option>
                        </select>
                        @include('includes.single_field_validation',['field'=>'subcategory_name'])
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$data['product']->name}}"/>
                        @include('includes.single_field_validation',['field'=>'name'])
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$data['product']->slug}}"/>
                        @include('includes.single_field_validation',['field'=>'slug'])
                    </div>


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" value="{{$data['product']->price}}"/>
                        @include('includes.single_field_validation',['field'=>'price'])
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" name="discount" class="form-control" id="discount" value="{{$data['product']->discount}}"/>
                        @include('includes.single_field_validation',['field'=>'discount'])
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" value="{{$data['product']->quantity}}"/>
                        @include('includes.single_field_validation',['field'=>'quantity'])
                    </div>


                    <div class="form-group">
                        <label for="status">Status</label><br>
                        @if($data['product']->status==1)
                            <input type="radio" name="status"  id="name" value="1" checked/>Active
                            <input type="radio" name="status"  id="name" value="0" />Inactive
                        @else
                            <input type="radio" name="status"  id="name" value="1"/>Active
                            <input type="radio" name="status"  id="name" value="0" checked />Inactive
                         @endif
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="30"rows="3">{{$data['product']->description}}</textarea>
                        @include('includes.single_field_validation',['field'=>'description'])
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" class="form-control" id="short_description" cols="30"rows="3">{{$data['product']->short_description}}</textarea>
                        @include('includes.single_field_validation',['field'=>'short_description'])
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="Update Product"><i class="fa fa-save"></i>Update Product</button>
                        <button type="submit" class="btn btn-danger" value="Clear"><i class="fa fa-recycle"></i>Cancel</button>
                    </div>

                    <div class="form-group">
                        <label for="status">Feature Key</label><br>
                        @if($data['product']->feature_key==1)
                            <input type="radio" name="status"  id="name" value="1" checked/>Active
                            <input type="radio" name="status"  id="name" value="0" />Inactive
                        @else
                            <input type="radio" name="status"  id="name" value="1"/>Active
                            <input type="radio" name="status"  id="name" value="0" checked />Inactive
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="status">Discount Key</label><br>
                        @if($data['product']->discount_key==1)
                            <input type="radio" name="status"  id="name" value="1" checked/>Active
                            <input type="radio" name="status"  id="name" value="0" />Inactive
                        @else
                            <input type="radio" name="status"  id="name" value="1"/>Active
                            <input type="radio" name="status"  id="name" value="0" checked />Inactive
                        @endif
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