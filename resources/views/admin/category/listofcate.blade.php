@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$cates->name}}
                            <small>List</small>
                        
                        </h1>
                    </div>
                    <div class="col-lg-7" >
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
                        </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cates->childs as $item)
                            
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td align="center"><a href="{{route('categories.edit',$item->id)}}"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil "></i>
                                </button></a></td>
                                <td align="center"><a href="{{route('categories.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash-o "></i>
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