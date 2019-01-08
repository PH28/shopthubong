@extends('master')
@section('content')
	<script src="source/assets/dest/js/imagezoom.js"></script>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$product->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('pageusers.index')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		 <section class="banner-bottom py-lg-5 py-3">
         <div class="container">
            <div class="inner-sec-shop pt-lg-4 pt-3">
               <div class="row">
                  <div class="col-lg-4 single-right-left ">
                     <div class="grid images_3_of_2">
                        <div class="flexslider1">
                           <ul class="slides">
                              <li data-thumb="source/image/product/{{$product->getFirstImageAttribute()->image}}">
                                 <div class="thumb-image"> <img src="source/image/product/{{$product->getFirstImageAttribute()->image}}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                              </li>
                              
                           </ul>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                     <h3>{{$product->name}}</h3>
                     <p><span class="item_price">{{number_format($product->price)}} VND</span>
                        
                     </p>
                     <div class="rating1">
                        <ul class="stars">
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                
                     <div class="color-quality">
                        <div class="color-quality-right">
                           <h5>Size :</h5>
                           <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                              <option value="null">S </option>
                              <option value="null">M </option>
                              <option value="null">L </option>
                              <option value="null">XL </option>
                           </select>
                        </div>
                     </div>
                     <div class="occasional">
          
                     <a class="add-to-cart" href=""><i class="fa fa-shopping-cart"></i></a> <span style="background-color: #3A5C83; font-size: 150%; color: white;"> Thêm vào giỏ hàng</span>
                   
                  </div>
                  <div class="clearfix"> </div>
                  <!--/tabs-->
                  <div class="responsive_tabs">
                     <div id="horizontalTab">
               
                        <div class="resp-tabs-container">
                           <!--/tab_one-->
                           <div class="tab1">
                              <div class="single_page">
                                 <h6>Mô Tả Sản Phẩm</h6>
                                 <p>{{$product->description}}
                                 </p>
                                 
                              </div>
                           </div>
                           <!--//tab_one-->
                           <div class="tab2">
                              <div class="single_page">
                                 <div class="bootstrap-tab-text-grids">
                                   
                                    <div class="add-review">
                                       <h4>add a review</h4>
                                       <form action="#" method="post">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <input type="text" name="Name" required="" placeholder="Nhập tên">
                                             </div>
                                             <div class="col-md-6">
                                                <input type="email" name="Email" required="" placeholder="Nhập địa chỉ email">
                                             </div>
                                          </div>
                                          <textarea name="Message" required="" placeholder="Nhận xét của bạn..."></textarea>
                                          <input type="submit" value="SEND">
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                          
                        </div>
                     </div>
                  </div>
                  <!--//tabs-->
               </div>
            </div>
         </div>
      </section>
	</div> <!-- .container -->
@endsection