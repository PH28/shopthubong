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

@endsection