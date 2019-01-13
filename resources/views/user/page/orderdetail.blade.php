@extends('user.master')
@section('content')
<div class="using-border py-3">
            <div class="inner_breadcrumb  ml-4">
               <ul class="short_ls">
                  <li>
                     <a href="{{route('home.index')}}">Home</a>
                     <span>/ /</span>
                  </li>
                  <li>Chi tiết đơn hàng</li>
               </ul>
            </div>
</div>


<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            	<div id="infouser">
			
               <div class="shop_inner_inf">
                  <div class="privacy about">
                  	<div id="subheading">
                  <h3>Chi tiết đơn hàng {{$order->id}}
                  	
                	</h3>
                	@if($order->status == 1)
                  	  	<form style="margin-top: 20px;margin-bottom: 20px" action="{{route('users.cancel',["userid" => Auth::user()->id, "id" => $order->id])}}" method="POST">
                            @csrf
                   			<button type="submit" onclick="return confirm('Bạn muốn hủy đơn hàng này ?');" class="btn btn-flat btn-info btn-warning "> Hủy đơn hàng</button>
                        <form>
                	@endif
					
				</div>
				<span >Thông tin khách hàng</span>
				<div class="row">
						<input type="hidden" name="user_id" id="id-add" value="{{$user->id}}">
						<div class="col-sm-6 form-group">
							<input type="text" name="yourname"  id="name-add" value="{{$user->fullname}}" class="form-control">
						</div>
						<div class="col-sm-6 form-group">
							<input type="email" name="email_order"  id="email-add" value="{{$user->email}}" class="form-control">
						</div>				
						<div class="col-sm-6 form-group">
							<input type="phone" name="phone_order"  id="phone-add" value="{{$user->phone}}" class="form-control">
						</div>
						<div class="col-sm-6 form-group">
							<input type="text" name="address_order"  id="address-add" value="{{$user->address}}" class="form-control">
						</div>
				</div>
				</div>
					
                     <span style="margin-bottom: 20px">Các sản phẩm đã đặt: </span>
                     <div class="clearfix"> </div>
                     <div class="checkout-right">
                        <table class="timetable_sub">
                           <thead>
                              <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                              </tr>
                           </thead>
                           <tbody>
                           	  	@foreach($order->orderdetails as $item)
                              <tr class="rem1">
                                <td>{{$item->id}}</td>
                                @if(!empty($item->product->getFirstImageAttribute()->image))
                                <td>
                                    <img src="{!! asset('images/'.$item->product->getFirstImageAttribute()->image) !!}" width="100"  height="80" alt="">
                                </td>
                                @else
                                  <td>  <img src="" width="100"  height="80" alt=""> </td>
                                @endif
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{number_format($item->unit_price)}} VND</td>

                              </tr>
                             @endforeach
                         
                           </tbody>
                        </table>
                        
                        <div class="clearfix"> </div>
                        <span style="margin-top: 20px; float: left;">Tổng cổng:</span>
                        <span style="margin-top: 20px;margin-right: 70px; float: right;"> {{number_format($total)}} VND</span>
                     </div>
                        <div class="clearfix"></div>
                     </div>
                     <center>
                        	<div style="margin-top: 10px; float: right;">

                        	</div>                        
                      </center>
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