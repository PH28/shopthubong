@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12">
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
                                <th>User Name</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($listUser as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->fullname}}</td>
                                @if($item->gender == 0)
                                <td>Khác</td>
                                @elseif($item->gender == 1)
                                <td>Nam</td>
                                @else
                                <td>Nữ</td>
                                @endif
                                <td>{{$item->role->name}}</td>
                                <td>{{$item->email}}</td>
                                
                                @if($item->status == 0)
                                <td>Active</td>
                                @else
                                <td>Not active</td>
                                @endif
                                <td align="center"><a href="{{route('users.edit',$item->id)}}""><button type="button" class="btn btn-success btn-circle"><i class="fa fa-pencil "></i>
                                </button></a></td>
                                <td align="center"><a href="{{route('users.destroy',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash-o "></i>
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