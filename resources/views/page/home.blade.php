@extends('master')
@section('content')

<div class="fullwidthbanner-container">
			<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									<!-- THE FIRST SLIDE -->
									@foreach($slide as $item)
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$item->image}}" data-src="source/image/slide/{{$item->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$item->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
			</div>
	</div>
				<!--slider-->
</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $item)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											
											<a href="{{route('pageusers.product',$item->id)}}"><img src="source/image/product/{{$item->getFirstImageAttribute()->image}}" alt="" width="270" height="320"></a>
											
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$item->name}}</p>
											<p class="single-item-price">
												<span>{{number_format($item->price)}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('pageusers.addcart', $item->id)}}" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-image="{{$item->getFirstImageAttribute()->image}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary cart_detail" href="{{route('pageusers.cartdetail')}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">
										{{$product->links()}}
									</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Các sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product_remain)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($product_remain as $item)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
									
											<a href="{{route('pageusers.product',$item->id)}}"><img src="source/image/product/{{$item->getFirstImageAttribute()->image}}" width="270" height="320" alt=""></a>
		
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$item->name}}</p>
											<p class="single-item-price">
												<span>{{number_format($item->price)}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('pageusers.addcart', $item->id)}}" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('pageusers.cartdetail')}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<hr>
							<h1 style="text-align: center;">Chi tiết giỏ hàng</h1>
							
							<span id="cart_details"></span>

							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
		
@endsection
