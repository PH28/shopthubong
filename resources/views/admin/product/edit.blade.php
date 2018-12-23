@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$product->name}} 
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(session('status'))
                        <div class="alert alert-danger">     
                            {{session('status')}}
                        </div>
                    @endif
                         @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('products.update',$product->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group" >
                                <label>Category </label>
                                <select class="form-control" name="category_id">
                                @foreach ($categoryIds as $key => $value)
                                   @if($key == $product->category_id )
                                  <option value="{{$key}}" selected="seleted">{{$value}}</option>
                                  @else
                                  <option value="{{$key}}" >{{$value}}</option>
                                  @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" name="name" value="{{$product->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input class="form-control" name="quantity" value="{{$product->quantity}}" />
                            </div>
                            <div class="form-group">
                                <label>Product Price</label>
                                <input class="form-control" name="price" value="{{number_format($product->price)}} VND "/>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="description" >{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Kind</label>
                                @if($product->kind == 1)
                                <label class="radio-inline">
                                    <input name="kind" value="1" checked="" type="radio">New
                                </label>
                                <label class="radio-inline">
                                    <input name="kind" value="0" type="radio">Old
                                </label>
                                @else
                                <label class="radio-inline">
                                    <input name="kind" value="1"  type="radio">New
                                </label>
                                <label class="radio-inline">
                                    <input name="kind" value="0" checked="" type="radio">Old
                                </label>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection