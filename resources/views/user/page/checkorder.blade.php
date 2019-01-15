@extends('user.master')
@section('content')
<div class="using-border py-3">
            <div class="inner_breadcrumb  ml-4">
               <ul class="short_ls">
                  <li>
                     <a href="{{route('home.index')}}">Home</a>
                     <span>/ /</span>
                  </li>
                  <li>Danh sách đơn hàng</li>
               </ul>
            </div>
</div>


<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Danh sách các đơn hàng</h3>
                     <div class="checkout-right">
                        <h4>Bạn có: <span>{{$count}} đơn hàng</span></h4>
                        <table class="timetable_sub">
                           <thead>
                              <tr>
                                 <th>SL No.</th>
                                 <th>Mã đơn hàng</th>
                                 <th>Ngày đặt hàng</th>
                                 <th>Tổng tiền</th>
                                 <th>Tình trạng</th>
                              </tr>
                           </thead>
                           <tbody>
                           	@php ($i = 1)
                           	@foreach($orders as $order)
                              <tr class="rem1">
                                 <td class="invert">{{$i++}}</td>
                                 <td class="invert-image"><a href="{{route('users.detail',["userid" => Auth::user()->id, "id" => $order->id])}}" style="color: black;text-decoration: underline">{{$order->id}}</a></td>
                                 <td class="invert">{{$order->date_order}}</td>
                                 <td class="invert">{{number_format($order->total)}} VND</td>
                                 <td class="invert">
                                    @if($order->status == 0)
                                      Đã duyệt
                                    @elseif($order->status == 1)
                                      Đang chờ duyệt
                                    @else
                                         Đã hủy 
                                    @endif
                                 </td>

                              </tr>
                             @endforeach
                           </tbody>
                        </table>
                        <div class="clearfix"> </div>
                     </div>
                        <div class="clearfix"></div>
                     </div>
                     <center>
                        	<div style="margin-top: 10px; float: right;">
                        		{!! $orders->links() !!}
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