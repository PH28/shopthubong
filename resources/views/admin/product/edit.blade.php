@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cập nhật sản phẩm: {{$product->name}} 
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
                         @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input class="form-control" type="hidden" name="id" value="{{$product->id}}" />
                            <div class="form-group" >
                                <label>Danh mục </label>
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
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" value="{{$product->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" name="quantity" value="{{$product->quantity}}" />
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" name="price" value="{{$product->price}}  "/>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" rows="3" name="description" >{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                @if($product->kind == 1)
                                <label class="radio-inline">
                                    <input name="kind" value="1" checked="" type="radio">Mới
                                </label>
                                <label class="radio-inline">
                                    <input name="kind" value="0" type="radio">Cũ
                                </label>
                                @else
                                <label class="radio-inline">
                                    <input name="kind" value="1"  type="radio">Mới
                                </label>
                                <label class="radio-inline">
                                    <input name="kind" value="0" checked="" type="radio">Cũ
                                </label>
                                @endif
                                <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file"  name="images[]" multiple>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection