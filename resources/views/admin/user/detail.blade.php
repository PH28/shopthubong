@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tên người dùng: {{$user->fullname}}
                        </h1>
                    </div>
                  
                    <!-- /.col-lg-12 -->
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
                        <form action="{{route('users.update', $user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group" >
                                <label>Quyền hạn</label>
                               <input class="form-control" name="username" value="{{$user->role->name}}"  required />
                            </div>
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="username" value="{{$user->username}}"  required />
                            </div>
                            <div class="form-group">
                                <label>Tên đầy đủ</label>
                                <input class="form-control" name="fullname"  value="{{$user->fullname}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                    @if($user->gender == 0)
                                    <input class="form-control" name="fullname"  value="Khác" >
                                    @elseif($user->gender == 1)
                                    <input class="form-control" name="fullname"  value="Nam" >
                                    @else
                                    <input class="form-control" name="fullname"  value="Nữ" >
                                    @endif
                                      
                            </div>

                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input class="form-control" type="date" name="dob" value="{{$user->dob}}" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email"  value="{{$user->email}}" required />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" value="{{$user->address}}" required />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone"  value="{{$user->phone}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                	@if($user->status == 1)
	                                <input class="form-control" name="fullname"  value="Đã xác thực" >
	                                @else
	                                <input class="form-control" name="fullname"  value="Chưa xác thực" >
	                                @endif
                            </div>
                  
                        <form>
                    </div>
                   	<div class="col-lg-12">
                   		<h4 class="page-header">Danh sách đơn hàng của {{$user->fullname}}
                        </h4>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>SĐT đặt</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->orders as $item)
                            <tr class="odd gradeX" >
                                <td>{{$item->id}}</td>
                                <td>{{$item->phone_order}}</td>
                                <td>{{$item->date_order}}</td>
                                <td>{{number_format($item->total)}} VND</td>
                                <td align="center"><div class="dropdown">
                                 @if($item->status == 0)
                                <span class="btn btn-flat btn-info " style="width:120px" >
                                      Đã duyệt                     
                                </span>
                                @elseif($item->status == 1)
                                <span class="btn btn-flat btn-info btn-danger"  style="width:120px">
                                      Đang chờ duyệt
                                </span>
                                @else
                                <span class="btn btn-flat btn-info btn-warning" style="width:120px">
                                      Đã hủy
                                </span>
                                @endif
                                </div></td>
                                <td align="center"><a href="{{route('orders.orderdetail',$item->id)}}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-eye">
                                </i></button></a></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
 @endsection