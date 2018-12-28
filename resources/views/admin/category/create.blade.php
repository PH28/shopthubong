@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
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

                        <form action="{{route('categories.store')}}" method="POST">

                            @csrf
                            <div class="form-group required"  >
                                <label for="">Category Parent </label>
                                <select class="form-control" name="parent_id">
                                    <option value="0" >Danh mục gốc</option>
                                @foreach ($categoryIds as $key => $value) 

                                @if($key != 0)                           
                                  <option value="{{$key}}" >{{$value}}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">Category Name </label>
                                <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                                @if($errors->has('name'))
                                        <p class="text-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                            <div class="form-group required">
                                <label>Category Description </label>
                                <textarea class="form-control" rows="3" name="description" ></textarea>
                                @if($errors->has('description'))
                                        <p class="text-danger">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
 @endsection