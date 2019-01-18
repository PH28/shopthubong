@extends('user.master')
@section('content')
<div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="{{route('home.index')}}">Home</a>
                  <span>/ <a href="{{route('home.shop')}}">Shop</a> /</span>
               </li>
               <li>Checkout</li>
            </ul>
         </div>
      </div>
<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                  		<div class="container">
		<div id="title">
			<h1>Kiểm tra thông tin</h1>
			<p>Vui lòng nhập thông tin cá nhân và thông tin thanh toán của bạn để thanh toán.</p>
		</div>
		<form action="" method="post" id="formcheckout">
			{{ csrf_field() }}
			<div id="infouser">
				<div id="subheading">
					<span>Thông tin khách hàng</span>
				</div>
				<div class="row">
					<input type="hidden" name="user_id" id="id-add" value="{{$user->id}}">
					<div class="col-sm-6 form-group">
						<input type="text" name="fullname"  id="name-add" value="{{$user->fullname}}" class="form-control">
             @if($errors->has('username'))
                     <p class="text-danger">{{$errors->first('fullname')}}</p>
            @endif
					</div>
					<div class="col-sm-6 form-group">
						<input type="email" name="email_order"  id="email-add" value="{{$user->email}}" class="form-control">
            @if($errors->has('username'))
                     <p class="text-danger">{{$errors->first('email_order')}}</p>
            @endif
					</div>				
					<div class="col-sm-6 form-group">
						<input type="phone" name="phone_order"  id="phone-add" value="{{$user->phone}}" class="form-control">
            @if($errors->has('username'))
                     <p class="text-danger">{{$errors->first('phone_order')}}</p>
            @endif
					</div>
					<div class="col-sm-6 form-group">
						<input type="text" name="address_order"  id="address-add" value="{{$user->address}}" class="form-control">
            @if($errors->has('username'))
                     <p class="text-danger">{{$errors->first('address_order')}}</p>
            @endif
					</div>
				</div>
			</div>
			<div id="paymentdetail">
				<div id="subheading">
					<span>Thông tin giỏ hàng</span>
				</div>
				<div id="table">
					<table class="table table-bordered table-striped timetable_sub">
						<thead>
							<th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Số lượng</th>
              <th>Sub Total</th>
              <th>Remove</th>
						</thead>
						<tbody>
							
						</tbody>
					</table>
					<div id="error_order_detail">
						
					</div>
				</div>
				<div id="payment" >
					<span class="text-danger">Total: </span>
					<span id="totalcheckout"></span>
					<sup> đ</sup>
					<input type="hidden" name="total" id="totaldetail" value="">
				</div>
			</div>
			<div class="text-center">
				<input type="submit" onclick="return confirm('Bạn muốn đặt hàng những sản phẩm này ?');" class="btn btn-flat btn-info btn-warning " value="Đồng ý đặt hàng" class="btn btn-primary btn-submit" id="submit">
			</div>			
		</form>
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
<script src="admin_asset/js/jquery-3.2.1.slim.min.js"></script>
<script src ="admin_asset/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ url('user_asset/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ url('js/checkout.js') }}"></script>

       <script src="admin_asset/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript">
	$(document).ready(function() {
		$.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
		 $('#formcheckout').submit(function(e){
              e.preventDefault();
              var cart = [];
              cart = JSON.parse(localStorage.getItem('cart'));;
              var id = $('#id-add').val();
              $.ajax({
                type: 'POST',
                url: "{{route('users.orderdetail')}}",
                dataType: 'json',
                data:{
                  id: $('#id-add').val(),
                  email_order: $('#email-add').val(),
                  phone_order: $('#phone-add').val(),
                  address_order: $('#address-add').val(),
                  cart : cart,
                },
                success: function(data) {
                      if(data.response == 0){
                          console.log(data.cate);
                          cart = [];
                          localStorage.setItem('cart',JSON.stringify(cart));
                          localStorage.setItem('checkcart',JSON.stringify(cart));
                          window.location.href = "{{route('home.message')}}";
                      }
                      if(data.response == 1){
                         toastr.error( data.message)
                      }
                    },
                error: function (data) {
                        var errors = data.responseJSON;
                        var errorsHtml = '';
                        console.log(data.responseJSON);
                        $.each(errors.errors, function( key, value ) {
                          errorsHtml =  value[0] ;
                          toastr.error( errorsHtml)
                        });
                        console.log( errorsHtml);
                    }
              })
            });
	});
</script>
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