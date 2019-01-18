@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cập nhật người dùng: {{$user->fullname}}
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
                        <form action="{{route('users.update', $user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input class="form-control" type="hidden" name="id" value="{{$user->id}}" />
                            <div class="form-group" >
                                <label>Quyền hạn</label>
                                <select class="form-control" name="role_id">
                                @foreach ($role_id as $key => $value)                            
                                  @if($key == $user->role_id )
                                  <option value="{{$key}}" selected="seleted">{{$value}}</option>
                                  @else
                                  <option value="{{$key}}" >{{$value}}</option>
                                  @endif
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="username" value="{{$user->username}}"   />
                            </div>
                            <div class="form-group">
                                <label>Tên đầy đủ</label>
                                <input class="form-control" name="fullname"  value="{{$user->fullname}}" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="form-control" name="gender">
                                    @if($user->gender == 0)
                                    <td>Khác</td>
                                    <option value="1"> Nam  </option>
                                    <option value="2"> Nữ</option>
                                    <option value="0" selected> Khác</option>
                                    @elseif($user->gender == 1)
                                    <option value="1" selected> Nam  </option>
                                    <option value="2"> Nữ</option>
                                    <option value="0" > Khác</option>
                                    @else
                                    <option value="1" > Nam  </option>
                                    <option value="2" selected> Nữ</option>
                                    <option value="0" > Khác</option>
                                    @endif
                                      
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input class="form-control" type="date" name="dob" value="{{$user->dob}}"  />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email"  value="{{$user->email}}"  />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" value="{{$user->address}}"  />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone"  value="{{$user->phone}}" />
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