@extends('layouts.backend')
@section('title','Product Create')
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

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product Management
            <a href="{{route('product.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i>
                List
            </a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UI</a></li>
            <li class="active">General</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <fr class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Basic Data</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Meta Data</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Image</a></li>
                        <li><a href="#tab_4" data-toggle="tab">Tags</a></li>
                        <li><a href="#tab_5" data-toggle="tab">Attributes</a></li>
                    </ul>
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                @include('includes.error')
                                @include('includes.flash')

                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($data['categories'] as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">SubCategory Name</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option value="">Select SubCategory</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input type="text" name="name" class="form-control" id="name"/>
                                    @include('includes.single_field_validation',['field'=>'name'])
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug"/>
                                    @include('includes.single_field_validation',['field'=>'slug'])
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" class="form-control" id="price"/>
                                    @include('includes.single_field_validation',['field'=>'price'])
                                </div>
                                <div class="form-group">
                                    <label for="discount"> Discount</label>
                                    <input type="number" discount="discount" class="form-control" id="discount"/>
                                    @include('includes.single_field_validation',['field'=>'discount'])
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" id="quantity"/>
                                    @include('includes.single_field_validation',['field'=>'quantity'])
                                </div>

                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea name="short_description" id="short_description" cols="30" rows="5" class="form-control" rows="3"></textarea>
                                    @include('includes.single_field_validation',['field'=>'short_description'])
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" rows="3"></textarea>
                                    @include('includes.single_field_validation',['field'=>'description'])
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="radio" name="status" class="" id="status" value="1" />Active
                                    <input type="radio" name="status" class="" value="0" id="status" checked/>Inactive
                                </div>
                                <div class="form-group">
                                    <label for="feature_key">Feature Key</label>
                                    <input type="radio" name="feature_key" class="" id="feature_key" value="1" />Active
                                    <input type="radio" name="feature_key" class="" value="0" id="feature_key" checked/>Inactive
                                </div>
                                <div class="form-group">
                                    <label for="discount_key">Discount Key</label>
                                    <input type="radio" name="discount_key" class="" id="discount_key" value="1" />Active
                                    <input type="radio" name="discount_key" class="" value="0" id="discount_key" checked/>Inactive
                                </div>



                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">

                                <div class="form-group">
                                    <label for="meta_keyword">Meta_Keyword</label>
                                    <textarea name="meta_keyword" id="meta_keyword" cols="30" class="form-control" rows="3"></textarea>
                                    @include('includes.single_field_validation',['field'=>'meta_keyword'])
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta_Description</label>
                                    <textarea name="meta_description" id="meta_description" cols="30" class="form-control" rows="3"></textarea>
                                    @include('includes.single_field_validation',['field'=>'meta_description'])
                                </div>

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="image_wrapper">
                                        <tr>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input type="file" name="product_image[]" class="form-control"/></td>
                                            <td>
                                                <a class="btn btn-block btn-warning sa-warning"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                        </tr>
                                    </table>
                                    <button type="button" id="addMoreImage" style="margin-bottom: 20px"><i class="glyphicon glyphicon-plus customplush"></i>Add</button>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab_4">


                                <div class="form-group">
                                    <label for="select_tags">Select Tags</label>
                                    <select   name="tag_id[]" id="select_tags" multiple>
                                        <option value="">Select Tags</option>
                                        @foreach($data['tags'] as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                    </select>
                                    @include('includes.single_field_validation',['field'=>'tag'])
                                </div>



                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="attribute_wrapper">
                                        <tr>
                                            <th>Name</th>
                                            <th>Value</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="attribute_name[]" placeholder="Enter Attribute Name" class="form-control"/></td>
                                            <td><input type="text" name="attribute_value[]" placeholder="Enter Attribute Value" class="form-control"/></td>
                                            <td>
                                                <a class="btn btn-block btn-warning sa-warning"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                        </tr>
                                    </table>
                                    <button type="button"  id="addMoreAttribute" style="margin-bottom: 20px"><i class="glyphicon glyphicon-plus customplush"></i>Add</button>
                                </div>


                            </div>


                            <!-- /.tab-content -->
                            <div class="tab-footer">
                                <button type="submit" value="Save Product" class="btn btn-success"><i class="fa fa-save"></i>Save Product</button>
                            </div>

                        </div>
                    </form>
                </fr>
            </div>
        </div>

    </section>

@endsection