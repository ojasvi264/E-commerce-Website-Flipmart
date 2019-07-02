@extends('layouts.backend')
@section('title','Product Create page')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product Management
            <a href="{{route('product.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i>
                List
            </a>
            <a href="{{route('product.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Create
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
                <h3 class="box-title">Create Product</h3>

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
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Category Name</th>
                        <td>{{$data['product']->category->name}}</td>
                    </tr>
                    <tr>
                        <th>SubCategory Name</th>
                        <td>{{$data['product']->subcategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{$data['product']->price}}</td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td>{{$data['product']->discount}}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>{{$data['product']->quantity}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$data['product']->name}}</td>
                    </tr>
                     <tr>
                         <th>Slug</th>
                         <td>{{$data['product']->slug}}</td>
                     </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{$data['product']->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$data['product']->description}}</td>
                    </tr>
                    <tr>
                    <th>Status</th>
                    <td>
                        @if($data['product']->status==1)
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">InActive</span>
                        @endif
                    </td>
                    </tr>
                    </tr>
                    <tr>
                        <th>Feature Key</th>
                        <td>
                            @if($data['product']->feature_key==1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">InActive</span>
                            @endif
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <th>Discount Key</th>
                        <td>
                            @if($data['product']->discount_key==1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">InActive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{\App\User::find($data['product']->created_by)->name}}</td>
                    </tr>


                    <tr>
                        <th>Created At</th>
                        <td>{{$data['product']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{$data['product']->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Deleted At</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Updated By</th>
                        <td>
                            @if(!empty($data['product']->updated_by))
                                {{\App\User::find($data['product']->updated_by)->name}}
                            @endif
                            {{$data['product']->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Tags</th>
                        <td>
                            <ul>
                                @foreach($data['product']->tags as $tag)
                                    <li>{{$tag->name}}</li>
                                    @endforeach
                            </ul>
                        </td>
                    </tr>



                    </thead>
                </table>
                <h4>Attribute Data</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data['product']->attributes as $attribute)
                        <tr>
                            <td>{{$attribute->name}}</td>
                            <td>{{$attribute->value}}</td>
                            <td>
                                <a href="{{route('attribute.edit',$attribute->id)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                                <form action="{{route('attribute.destroy',$attribute->id)}}" method="post"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <button class="btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </table>
                <h4> Image Data</h4>
                <div class="row">
                    @foreach($data['product']->images as $image)
                        <div class="col-md-3">
                           <div class="img-container">
                               <button class="btn btn-danger btn-close">X</button>
                               <img src="{{asset('images/product/' .$image->image)}}" alt="" height="100" width="100">
                           </div>

                        </div>
                    @endforeach
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