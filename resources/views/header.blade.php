<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 92 Quang Trung, Hải Châu, Đà Nẫng</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0961 141 478</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check()) 
						<li><a href="" title="">Xin chào, {{ Auth::user()->fullname }}</a></li>
						 <li><a href="{{route('pageusers.logout')}}">Logout</a></li>        
						 @else
						<li><a href="{{route('pageusers.showregister')}}">Đăng kí</a></li>
						<li><a href="{{route('pageusers.showlogin')}}">Đăng nhập</a></li>
						@endif  
					</ul>

				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('pageusers.index')}}" id="logo"><img src="source/logo/logo.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						
						<div class="cart">
							<a class="beta-btn primary" href="{{route('pageusers.cartdetail')}}">Xem giỏ hàng <i class="fa fa-chevron-right"></i></a>
							
						</div> <!-- .cart -->
					
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #FD6282;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('pageusers.index')}}">Trang chủ</a></li>
						<li><a href="{{route('pageusers.index')}}">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($category as $item)	 
								<li><a href="{{route('pageusers.category',$item->id)}}">{{$item->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('pageusers.about')}}">Giới thiệu</a></li>
						<li><a href="{{route('pageusers.contact')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->