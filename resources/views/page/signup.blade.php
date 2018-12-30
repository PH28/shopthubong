@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			@if(session('success'))
                        <div class="alert alert-danger">
                       
                            {{session('success')}}
                        
                        </div>
                        @endif
                     @if(session('fail'))
                        <div class="alert alert-danger">
                       
                            {{session('fail')}}
                        
                        </div>
                        @endif
			<form action="{{route('pageusers.register')}}" method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						
                            @csrf
                         
                            <div class="form-group required">
                                <label for="">User Name </label>
                                <input class="form-control" name="username" placeholder="Please Enter User Name"  value="{{ old('username') }}"  />
                            </div>
                            @if($errors->has('username'))
                                        <p class="text-danger">{{$errors->first('username')}}</p>
                                @endif
                            <div class="form-group required">
                                <label for="">Full Name </label>
                                <input class="form-control" name="fullname" placeholder="Please Enter Full Name" value="{{ old('fullname') }}"/>
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
                                <input class="form-control" name="address" placeholder="Please Enter adress" value="{{ old('address') }}" />
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
                            <div class="form-group required">
                                <label for="">Password </label>
                                <input class="form-control"  type ="password" name="password" placeholder="Please Enter Password" />
                            </div>
                             @if($errors->has('password'))
                                        <p class="text-danger">{{$errors->first('password')}}</p>
                            @endif
                            <div class="form-group required">
                                <label for="">Password Confirm</label>
                                <input class="form-control"  type ="password" name="password_confirmation" placeholder="Please Enter Password Again" />
                            </div>
                              @if($errors->has('password_confirmation'))
                                        <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                            @endif
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                        
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection