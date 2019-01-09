@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm tìm thấy</h4>
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
											<a class="add-to-cart pull-left" href="#" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-image="{{$item->getFirstImageAttribute()->image}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary cart_detail" href="{{route('pageusers.cartdetail')}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

			
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection