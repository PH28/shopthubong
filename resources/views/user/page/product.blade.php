@extends('user.master')
@section('content')
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="{{route('home.index')}}">Home</a>
                  <span>/ <a href="{{route('home.shop')}}">Shop</a> /</span>
               </li>
               <li>Single Page</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--//banner -->
      <!--/shop-->
      <section class="banner-bottom py-lg-5 py-3">
         <div class="container">
            <div class="inner-sec-shop pt-lg-4 pt-3">
               <div class="row">
                  <div class="col-lg-4 single-right-left ">
                     <div class="grid images_3_of_2">
                        <div class="flexslider1">
                           <ul class="slides">
                               @foreach($product->images as $image)
                              <li data-thumb="images/{{$image->image}}">
                                 <div class="thumb-image"> <img src="images/{{$image->image}}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                              </li>
                              @endforeach
                           </ul>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                     <h3>{{$product->name}}</h3>
                     <p><span class="item_price">{{number_format($product->price)}} VND</span>
                     </p>
                     
                     <div class="color-quality">
                     </div>
                     <div class="occasional">
                        <div class="clearfix"> </div>
                     </div>
                     <div class="quantity">
                             
                     </div>
                     <div class="color-quality">
                        <div class="color-quality-right">
                            <h5>Quantity :</h5>
                              <input type="number" class="input-text qty text qtt" step="1" min="1" max="" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">

                        </div>
                     </div>
                     <div class="occasional">
                        <div class="clearfix"> </div>
                     </div>
                     <div class="occasion-cart">
                        <div class="toys single-item hvr-outline-out">

                               <button class="toys-cart ptoys-cart add-cart" id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}" data-image="{{$image->image}}" data-quantity = 1 product-quantity="{{$product->quantity}}">

                                          <i class="fas fa-cart-plus"></i>
                               </button>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"> </div>
                  <!--/tabs-->
                  <div class="responsive_tabs">
                     <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                           <li>Description</li>
                           <li>Reviews</li>
                        </ul>
                        <div class="resp-tabs-container">
                           <!--/tab_one-->
                           <div class="tab1" >
                              <div class="single_page" style="width: 100%">
                                 <h6>Description</h6>
                                 <p>{{$product->description}}
                                 </p>
                              </div>
                           </div>
                           <!--//tab_one-->
                           <div class="tab2">
                              <div class="single_page" style="width: 100%">
                                 <div class="bootstrap-tab-text-grids">
                                    <h4>Bình luận</h4>
                                    @foreach($product->reviews as $review)
                                    <div class="bootstrap-tab-text-grid">
                                       <div class="">
                                          <span>{{ $review->user->fullname}}
                                          </span>
                                          <span style="font-size: 10px;"> {{ $review->created_at}}
                                          </span> 
                                          <p style="margin-top: 0px">{{$review->review_text}}
                                          </p>
                                       </div>
                                       <div class="clearfix"> </div>
                                    </div>
                                    @endforeach
                                    @if(Auth::check()) 
                                    <div class="add-review">
                                       <h4><p>Bình luận dành cho sản phẩm này
                                    </p></h4>
                                       <form action="{{route('users.review',$product->id)}}" method="post">
                                          @csrf
                                          <textarea name="review_text" required=""></textarea>
                                          @if($errors->has('review_text'))
                                        <p class="text-danger">{{$errors->first('review_text')}}</p>
                                @endif
                                          <input type="submit" value="SEND">
                                       </form>
                                    </div>
                                    @else
                                    Bạn cần phải đăng nhập để bình luận
      <button type="button" data-toggle="modal"   class="btn btn-primary" data-target="#exampleModal"> Đăng nhập</button>
                                    @endif
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
      <section class="blog py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Products Related</h3>
            <div class="slid-img">  
               <ul id="flexiselDemo1">
                  @foreach($product_related as $item)
                  <li>
                     <div class="agileinfo_port_grid">
                         @if(!empty($item->getFirstImageAttribute()->image))
                        <img src="images/{{$item->getFirstImageAttribute()->image}}" alt=" " style="width: 260px; height: 230px; " class="img-fluid" />
                        @else
                                   <img src=""  style="width: 260px; height: 230px;" alt=""> 
                        @endif
                        <div class="banner-right-icon">
                           <h4 class="pt-3">{{$item->name}}</h4>
                        </div>
                        <div class="outs_more-buttn">
                           <a href="{{route('home.product', $item->id)}}">Shop Now</a>
                        </div>
                     </div>
                  </li>
                   @endforeach
               </ul>
            </div>
         </div>
</section>
      <!--subscribe-address-->
      
      <!--//subscribe-address-->
      
      <!--//subscribe-->
      <!-- footer -->
      
      <!-- //footer -->
      <!-- Modal 1-->
      
      <!-- //Modal 1-->
      <!--jQuery-->
      <script src="user_asset/js/jquery-2.2.3.min.js"></script>
      <!-- newsletter modal -->
      <!-- cart-js -->
      <script src="user_asset/js/minicart.js"></script>
      <script>
         toys.render();
         
         toys.cart.on('toys_checkout', function (evt) {
         	var items, len, i;
         
         	if (this.subtotal() > 0) {
         		items = this.items();
         
         		for (i = 0, len = items.length; i < len; i++) {}
         	}
         });
      </script>
      <!-- //cart-js -->
      <!-- price range (top products) -->
      <script src="user_asset/js/jquery-ui.js"></script>
      <script>
         //<![CDATA[ 
         $(window).load(function () {
         	$("#slider-range").slider({
         		range: true,
         		min: 0,
         		max: 9000,
         		values: [50, 6000],
         		slide: function (event, ui) {
         			$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
         		}
         	});
         	$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
         
         }); //]]>
      </script>
      <!-- //price range (top products) -->
      <!-- single -->
      <script src="user_asset/js/imagezoom.js"></script>
      <!-- single -->
      <!-- script for responsive tabs -->
      <script src="user_asset/js/easy-responsive-tabs.js"></script>
      <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion           
         		width: 'auto', //auto or any width like 600px
         		fit: true, // 100% fit in a container
         		closed: 'accordion', // Start closed if in accordion view
         		activate: function (event) { // Callback function if tab is switched
         			var $tab = $(this);
         			var $info = $('#tabInfo');
         			var $name = $('span', $info);
         			$name.text($tab.text());
         			$info.show();
         		}
         	});
         	$('#verticalTab').easyResponsiveTabs({
         		type: 'vertical',
         		width: 'auto',
         		fit: true
         	});
         });
      </script>
      <!-- FlexSlider -->
      <script src="user_asset/js/jquery.flexslider.js"></script>
      <script>
         // Can also be used with $(document).ready()
         $(window).load(function () {
         	$('.flexslider1').flexslider({
         		animation: "slide",
         		controlNav: "thumbnails"
         	});
         });
      </script>
      <!-- //FlexSlider-->
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
      <script>
         $('.value-plus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
               newVal = parseInt(divUpd.text(), 10) + 1;
            divUpd.text(newVal);
         });
         
         $('.value-minus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
               newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal >= 1) divUpd.text(newVal);
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

            $('.color-quality-right').on('click', function(){
               var quantity = $('input[type=number]').val(); // so luong ma nguoi dung nhap vao
               var soluong = $('.add-cart').attr('product-quantity');              
               if( quantity > soluong)
               {
                  alert("số lượng sản phẩm phải lớn hơn 0 và bé hơn " + soluong);
                  $('.qtt').val(soluong);
               }

               $('.add-cart').attr('data-quantity', quantity);
            });

             $('.color-quality-right').on('change', function(){
               var quantity = $('input[type=number]').val(); // so luong ma nguoi dung nhap vao
               var soluong = $('.add-cart').attr('product-quantity');
               if(parseInt(quantity) < 0)
               {
                  alert("Giá trị không hợp lệ");
                   $('.qtt').val(1);   
                  quantity = 1;  
               }
               if(parseInt(quantity) >parseInt(soluong))
               {
                  alert("số lượng sản phẩm phải lớn hơn 0 và bé hơn " + soluong);
                  $('.qtt').val(soluong);   
                  quantity = soluong;       
               }
                   $('.add-cart').attr('data-quantity', quantity);
 
            })

            

         });
          function Changeproduct(e)
            {
               console.log("change product");
               var quantity = e.value;
               var soluong = $('.add-cart').attr('product-quantity');
               if( quantity > soluong)
               {
                  alert("số lượng sản phẩm phải lớn hơn 0 và bé hơn " + soluong);
                  $('.qtt').val(soluong);
               }

               $('.add-cart').attr('data-quantity', quantity);
            }
      </script>
      <!-- //here ends scrolling icon -->
      <!-- //smooth-scrolling-of-move-up -->
      <!--bootstrap working-->
      <script src="user_asset/js/bootstrap.min.js"></script>
@endsection