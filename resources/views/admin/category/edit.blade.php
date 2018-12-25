@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
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
                        <form action="{{route('categories.update',$category->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group" >
                                @if($category->parent_id != 0 )
                                <label>Category Parent</label>
                                <select class="form-control" name="parent_id">
                                
                                @foreach ($categoryIds as $key => $value)
                                @if($key != 0)     
                                   @if($key == $category->parent_id )
                                  <option value="{{$key}}" selected="seleted">{{$value}}</option>
                                  @else
                                  <option value="{{$key}}" >{{$value}}</option>
                                  @endif
                                @endif
                                @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="name" value="{{$category->name}}" />
                            </div>
           
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" rows="3" name="description">{{$category->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Category Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection