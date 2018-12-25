@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$product->name}}
                            <small>Detail</small>
                            <small><i class="fa fa-pencil fa-fw page-header"></i> <a href="{{route('products.edit',$product->id)}}"  >Edit</a></small>

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
                                <label>Category Name</label>
                                <input class="form-control" name="name" value="{{$product->category->name}}" />
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
                                    <input name="kind" value="0" type="radio" disabled="">Old
                                </label>
                                @else
                                <label class="radio-inline">
                                    <input name="kind" value="1"  type="radio" disabled="">New
                                </label>
                                <label class="radio-inline">
                                    <input name="kind" value="0" checked="" type="radio">Old
                                </label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Image</label>
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
                        <h4 class="page-header">Review of {{$product->name}} 
                            <small>List</small>
                        </h4>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Review Content</th>
                                <th>Status</th>
                                <th>Delete</th>
                                
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