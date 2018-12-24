@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
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
                                <label>Role Id</label>
                                <select class="form-control" name="role_id">
                                @foreach ($role_id as $key => $value)                            
                                  <option value="{{$key}}" >{{$value}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input class="form-control" name="username" value="{{$user->username}}"  required />
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" name="fullname"  value="{{$user->fullname}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="1"> Nam  </option>
                                    <option value="0"> Khác</option>
                                      <option value="2"> Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date of birth</label>
                                <input class="form-control" type="date" name="dob" value="{{$user->dob}}" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email"  value="{{$user->email}}" required />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" value="{{$user->address}}" required />
                            </div>
                            <div class="form-group">
                                <label> Phone</label>
                                <input class="form-control" name="phone"  value="{{$user->phone}}" required/>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="statusr">
                                    <option value="0"> Active </option>
                                     <option value="1"> Not active</option>
                                </select>
                            </div>
                            <input type="hidden" name="password" value="$2y$10$TKh8H1.">
                             
                            <button type="submit" class="btn btn-default">Update</button>
                  
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
 @endsection