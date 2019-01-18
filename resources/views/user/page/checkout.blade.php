@extends('user.master')
@section('content')
<div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="{{route('home.index')}}">Home</a>
                  <span>/ <a href="{{route('home.shop')}}">Shop</a> /</span>
               </li>
               <li>Cart</li>
            </ul>
         </div>
      </div>
<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h1>List Order:</h1>
   <hr>
   <table class="table table-bordered table-striped timetable_sub">
      <thead>
         <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Số lượng</th>
            <th>Sub Total</th>
            <th>Remove</th>
         </tr>
      </thead>
      <tbody>
      </tbody>
   </table>
   <div id="tongtien">
      <span class="text-danger">Total: </span>
      <span id="totalcheckout"></span>
   </div>
   
   <div id="orderError">
      
   </div>
   <div id="checkout">
      <br>
      @if(Auth::check()) 
      <a href="{{route('users.cart')}}" class="btn btn-info">Tiến hành thanh toán</a>
      @else
      Bạn cần phải đăng nhập thì mới thanh toán được đơn hàng
      <button type="button" data-toggle="modal"   class="btn btn-primary" data-target="#exampleModal"> Đăng nhập</button>
      @endif
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
<script type="text/javascript" src="{{ url('js/checkout.js') }}"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $('.table').on('change', 'input', function() {
            html = '';
            var id = $(this).attr('id');
            var qtt = parseInt($(this).val());
            var endqtt = parseInt($(this).attr('data_qtt'));
            console.log(endqtt);
            $.ajax({
               url: "product/check/"+id,
               type: 'get',
               dataType: 'json',
               data: {id: id},
            success: function(data) {
               console.log(data);
               if (qtt < 1 || qtt > data ) {
                  alert("Số lượng không được nhỏ hơn 0 hoặc lơn hơn "+data);
                  console.log(endqtt);
                  $('.soluong').val(endqtt);
               } else {
                  $.each(cart, function(index, val) {
                     if (val.id == id) {
                        console.log('cong qtt len ' ,qtt);
                        val.qtt = qtt;
                        val.subtotal = val.qtt * val.price;
                     }
                  });
                  localStorage.setItem('cart', JSON.stringify(cart));
                  printorder(cart);
                  }
               }
            })
         });
      });
   </script>
@endsection