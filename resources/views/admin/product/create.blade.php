@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                    </div>
                  
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(session('success'))
                        <div class="alert alert-success">     
                            {{session('success')}}
                        </div>
                        @endif
                        @if(session('fail'))
                        <div class="alert alert-danger">     
                            {{session('fail')}}
                        </div>
                        @endif
                        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group required" >

                                <label for="">Category </label>
                                <select class="form-control" name="category_id">
                                @foreach ($categoryIds as $key => $value)
                                 
                                  <option value="{{$key}}" >{{$value}}</option>
                                 
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">Product Name </label>
                                <input class="form-control" name="name" placeholder="Please Enter Product Name" value="{{ old('name') }}" />
                                 @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="form-group required"> 
                                <label for="">Product Quantity </label>
                                <input class="form-control" name="quantity" placeholder="Please Enter Product Quantity" value="{{ old('quantity') }}" />
                                 @if($errors->has('quantity'))
                                        <p class="text-danger">{{$errors->first('quantity')}}</p>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="">Product Price </label>
                                <input class="form-control" name="price" placeholder="Please Enter Product Price" value="{{ old('price')}}" />
                                 @if($errors->has('price'))
                                        <p class="text-danger">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label for="">Product Description </label>
                                <textarea class="form-control" rows="3" name="description" >{{ old('description') }}</textarea>
                                 @if($errors->has('description'))
                                        <p class="text-danger">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Product Kind</label>
                                <label class="radio-inline">
                                    <input name="kind" value="1" checked="" type="radio">New
                                </label>
                                <label class="radio-inline">
                                    <input name="kind" value="0" type="radio">Old
                                </label>
                            </div>
                            <div class="form-group">
                                            <label>Image</label>
                                            <input type="file"  name="images[]" multiple>
                            </div>

                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
@endsection