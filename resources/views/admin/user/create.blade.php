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
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
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
                                <input class="form-control" name="username" placeholder="Please Enter User Name"  required />
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" name="fullname" placeholder="Please Enter Full Name" required/>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="0"> 1 </option>
                                     <option value="1"> 2 </option>
                                      <option value="2"> 3 </option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" required />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter adress" required />
                            </div>
                            <div class="form-group">
                                <label> Phone</label>
                                <input class="form-control" name="phone" placeholder="Please Enter phone" required/>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input class="form-control" name="status" placeholder="Please Enter status" required />
                            </div>
                            <input type="hidden" name="password" value="$2y$10$TKh8H1.">
                             <div class="form-group">
                                <label>Date of birth</label>
                                <input class="form-control" name="dob"  required />
                            </div>
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