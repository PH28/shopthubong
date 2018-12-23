@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-7" >
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
                        </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category Parent</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $item)
                            @if($item->id != 0)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td class="center"><i class="fa fa-th-list   fa-fw"></i><a href="{{route('categories.listCate',$item->id)}}">{{$item->name}}</a></td>
                                <td>{{$item->parent_id}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('categories.edit',$item->id)}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('categories.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"> Delete</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection