@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tên sản phẩm: {{$product->name}}
                            <small><i class="fa fa-pencil fa-fw page-header"></i> <a href="{{route('products.edit',$product->id)}}"  >Chỉnh sửa</a></small>

                        </h1>
                        
                    </div>
                    
                 <div class="col-lg-7" >
                    <!-- /.col-lg-12 -->
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
                        <div class="form-group" >
                                <label>Danh mục</label>
                                <input class="form-control" name="name" value="{{$product->category->name}}" />
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
                                <input class="form-control" name="price" value="{{number_format($product->price)}} VND "/>
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
                                    <input name="kind" value="0" type="radio" disabled="">Cũ
                                </label>
                                @else
                                <label class="radio-inline">
                                    <input name="kind" value="1"  type="radio" disabled="">Mới
                                </label>
                                <label class="radio-inline">
                                    <input name="kind" value="0" checked="" type="radio">Cũ
                                </label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                            </div>
                            <div class="form-group">
                                @foreach($product->images as $item)
                                <img src="{!! asset('images/'.$item->image) !!}" width="100"  height="80" alt="">
                                @endforeach   
                            </div>

                 
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">Bình luận: {{$product->name}} 
                        </h4>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Xóa</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product->reviews as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->fullname}}</td>
                                <td>{{$item->review_text}}</td>
                                
                                @if($item->status == 1)
                                <td>Hiện</td>
                                @else
                                <td>Ẩn</td>  
                                @endif
                                <td align="center"><a href="{{route('reviews.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash-o "></i>
                                </button></a></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection