
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
                   
                        <form action="{{route('users.store')}}" method="POST">
                            @csrf
                            <div class="form-group required" >
                                <label for="">Role Id </label>
                                <select class="form-control" name="role_id">
                                @foreach ($role_id as $key => $value)                            
                                  <option value="{{$key}}" >{{$value}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">User Name </label>
                                <input class="form-control" name="username" placeholder="Please Enter User Name" value="{{ old('username') }}"   />
                            </div>
                            @if($errors->has('username'))
                                        <p class="text-danger">{{$errors->first('username')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Full Name </label>
                                <input class="form-control" name="fullname" placeholder="Please Enter Full Name" value="{{ old('fullname') }}" />
                            </div>
                            @if($errors->has('fullname'))
                                        <p class="text-danger">{{$errors->first('fullname')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Gender </label>
                                <select class="form-control" name="gender">
                                    <option value="0"> Khác </option>
                                     <option value="1"> Nam</option>
                                      <option value="2"> Nữ </option>
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="">Date of birth </label>
                                <input class="form-control" type="date" name="dob"  value="{{ old('dob') }}" />
                            </div>
                            @if($errors->has('dob'))
                                        <p class="text-danger">{{$errors->first('dob')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Email </label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" value="{{ old('email') }}"  />
                            </div>
                            @if($errors->has('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Address </label>
                                <input class="form-control" name="address" placeholder="Please Enter adress"  value="{{ old('address') }}"/>
                            </div>
                            @if($errors->has('address'))
                                        <p class="text-danger">{{$errors->first('address')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Phone </label>
                                <input class="form-control" name="phone" placeholder="Please Enter phone" value="{{ old('phone') }}" />
                            </div>
                            @if($errors->has('phone'))
                                        <p class="text-danger">{{$errors->first('phone')}}</p>
                            @endif
                             
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
@endsection