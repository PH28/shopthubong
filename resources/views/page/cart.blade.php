@extends('master')
@section('content')
 <script type="text/javascript" src="{{ url('js/cart.js') }}"></script> 
 <script type="text/javascript">
	$(document).ready(function(){
	 showCart(cart);
	})
 </script>
<h1 style="text-align: center;">Chi tiết giỏ hàng</h1>
<hr>
	<span id="cart_details"></span>
 
 <div style="text-align: center; font-size: 200%">
 	<a class="beta-btn primary cart_detail" href="{{route('pageusers.getcheckout')}}">Tiến hành đặt hàng <i class="fa fa-chevron-right"></i></a>	
 </div>
 <hr>
 
@endsection