@extends('user.master')
@section('content')
<section class="about py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Thông báo</h3>
            <div class="about-innergrid-agile text-center">
              
               @if(session('success'))
               <p class="mb-3"> {{session('success')}}
               </p>
               @endif
                <p>Trở về  <a href="{{route('home.index')}}" style="color:black; text-decoration: underline;" >Trang chủ </a></p>
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