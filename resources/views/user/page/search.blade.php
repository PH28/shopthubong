@extends('user.master')
@section('content')
<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Toys Shop</h3>
            @if(count($product) != 0)
                <h6 style="text-align: center;">Tìm được {{count($product)}} sản phẩm</h6>
            @endif
            <div class="row">
               <div class="side-bar col-lg-3">
                  <!-- //reviews -->
                  <!-- deals -->
                  <div class="deal-leftmk left-side">
                     <h3 class="agileits-sear-head">New Products</h3>

                     @foreach($new_products as $item)
                        <div class="row special-sec1">
                        <div class="col-xs-4 img-deals">
                            @if(!empty($item->getFirstImageAttribute()->image))
                           <img src="images/{{$item->getFirstImageAttribute()->image}}" style="width: 90px; height: 90px; " alt="" class="img-fluid">
                            @else
                                   <img src="" style="width: 90px; height: 90px; " alt=""> 
                              @endif
                        </div>
                        <div class="col-xs-8 img-deal1">
                           <h3>{{$item->name}}</h3>
                           <a href="{{route('home.product', $item->id)}}">{{number_format($item->price)}} VND</a>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     @endforeach
                     
                     

                  </div>
                  <!-- //deals -->
               </div>
               
               <div class="left-ads-display col-lg-9">
                  <div class="row">
                     @if(count($product)==0)
                        <h6 style="text-indent: 50px">Không tìm được sản phẩm</h6>
                     @else
                     @foreach($product as $item)
                     <div class="col-lg-4 col-md-6 col-sm-6 product-men women_two">
                        <div class="product-toys-info">
                           <div class="men-pro-item">
                              <div class="men-thumb-item">
                                  @if(!empty($item->getFirstImageAttribute()->image))
                                 <img src="images/{{$item->getFirstImageAttribute()->image}}" class="img-thumbnail img-fluid" alt=""  style="width: 285px; height: 285px; ">
                                 @else
                                   <img src="" style="width: 285px; height: 285px; " alt=""> 
                                 @endif
                                 <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                       <a href="{{route('home.product', $item->id)}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                 </div>
                                 @if($item->kind == 1)
                                 <span class="product-new-top">New</span>
                                 @endif
                              </div>
                              <div class="item-info-product">
                                 <div class="info-product-price">
                                    <div class="grid_meta">
                                       <div class="product_price">
                                          <h4>
                                             <a href="single.html">{{$item->name}}</a>
                                          </h4>
                                          <div class="grid-price mt-2">
                                             <span class="money ">{{number_format($item->price)}} VND</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="toys single-item hvr-outline-out">
                                          <button class="toys-cart ptoys-cart add-cart" id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-image="{{$item->getFirstImageAttribute()->image}}">
                                          <i class="fas fa-cart-plus"></i>
                                          </button>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach

                     @endif
                  </div>
           
                  <div class="col-lg-4 col-md-6 col-sm-6 product-men women_two">
                 		  <div class="row">
                                {{$product->appends(\Input::except('page'))->render()}}
                     </div>
                  </div>
               </div>
             
               </div>

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