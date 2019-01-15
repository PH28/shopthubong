@extends('user.master')
@section('content')
<div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="{{route('home.index')}}">Home</a>
                  <span>/ /</span>
               </li>
               <li>Đăng ký</li>
            </ul>
         </div>
      </div>
<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                  		<div class="container">
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
			<form action="{{route('users.register')}}" method="post" class="beta-form-checkout">
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
	</div>
		</div>
                  </div>
               </div>
               <!-- //top products -->
            </div>
         </section> 
         <script src="user_asset/js/jquery-2.2.3.min.js"></script>
      <!--//js working-->
      <!-- cart-js -->  
      
      <!--// cart-js -->
      <!--quantity-->
     
      <!--quantity-->
      <!--closed-->

      <!--//closed-->
      <!-- start-smoth-scrolling -->
      
     
      <script src="user_asset/js/move-top.js"></script>
      <script src="user_asset/js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
               event.preventDefault();
               $('html,body').animate({
                  scrollTop: $(this.hash).offset().top
               }, 900);
            });
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         
            var defaults = {
               containerID: 'toTop', // fading element id
               containerHoverID: 'toTopHover', // fading element hover id
               scrollSpeed: 1200,
               easingType: 'linear'
            };
            $().UItoTop({
               easingType: 'easeOutQuart'
            });
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
<script type="text/javascript" src="{{ url('user_asset/js/bootstrap.min.js') }}"></script>
@endsection