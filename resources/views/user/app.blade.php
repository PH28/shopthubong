<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <base href="{{asset('')}}" >
      <title>Toys Shop an Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="Toys Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script>
         addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
            window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <link href="user_asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="user_asset/css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--Shoping cart-->
      <link rel="stylesheet" href="user_asset/css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <link rel="stylesheet" type="text/css" href="user_asset/css/jquery-ui1.css">
      <link href="user_asset/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
      <link rel="stylesheet" href="user_asset/css/flexslider.css" type="text/css" media="screen" />
      <!--stylesheets-->
      <link href="user_asset/css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link rel="stylesheet" type="text/css" href="user_asset/css/checkout.css">
      <link rel="stylesheet" type="text/css" href="css/custom.css">
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
     
   </head>
   <body>
      <div class="header-outs" id="home">
      @include('user.partials.header')
      @include('user.partials.slide')
      </div>
      <!-- //banner -->
      <!-- about -->
      
      <!-- //about -->
      <!--new Arrivals -->
      
      <!--//about -->
      <!--Customers Review -->
      <!--//Customers Review -->
      <!-- Product-view -->
      
      <!--//Product-view-->
      <!--//Product-view-->
      @yield('content')
      <!--Product-about-->
      
      <!--//Product-about-->
      <!--subscribe-address-->
      
      <!--//subscribe-address-->
      @include('user.partials.footer')
      <!-- //footer -->
      <!-- Modal 1-->
      
      <!-- //Modal 1-->
      <!--js working-->

     
      <!--//js working-->
      <!-- cart-js -->
      <script type="text/javascript" src="{{ url('js/minicart.js') }}"></script> 
      <script type="text/javascript">

        $(document).ready(function() {
            print_shopping(cart);                   
            $('#cart-popover').popover({
                html : true,
                container: 'body',
                content:function(){
                    return $('#popover_content_wrapper').html();                    
                }
            });
        });        
    </script>
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

      <!--responsiveslides banner-->
      <script src="user_asset/js/responsiveslides.min.js"></script>
      <script>
         // You can also use "$(window).load(function() {"
         $(function () {
         	// Slideshow 4
         	$("#slider4").responsiveSlides({
         		auto: true,
         		pager:false,
         		nav:true ,
         		speed: 900,
         		namespace: "callbacks",
         		before: function () {
         			$('.events').append("<li>before event fired.</li>");
         		},
         		after: function () {
         			$('.events').append("<li>after event fired.</li>");
         		}
         	});
         
         });
      </script>
      <!--// responsiveslides banner-->	 
      <!--slider flexisel -->
      <script src="user_asset/js/jquery.flexisel.js"></script>
      <script>
         $(window).load(function() {
         	$("#flexiselDemo1").flexisel({
         		visibleItems: 3,
         		animationSpeed: 3000,
         		autoPlay:true,
         		autoPlaySpeed: 2000,    		
         		pauseOnHover: true,
         		enableResponsiveBreakpoints: true,
         		responsiveBreakpoints: { 
         			portrait: { 
         				changePoint:480,
         				visibleItems: 1
         			}, 
         			landscape: { 
         				changePoint:640,
         				visibleItems:2
         			},
         			tablet: { 
         				changePoint:768,
         				visibleItems: 2
         			}
         		}
         	});
         	
         });
      </script>
      <!-- //slider flexisel -->
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
      
      <!-- //bootstrap working-->
   </body>
</html>