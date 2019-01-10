
         <div class="header-bar">
            <div class="info-top-grid">
               <div class="info-contact-agile">
                  <ul>
                     <li>
                        <span class="fas fa-phone-volume"></span>
                        <p>+(000)123 4565 32</p>
                     </li>
                     <li>
                        <span class="fas fa-envelope"></span>
                        <p><a href="mailto:info@example.com">info@example1.com</a></p>
                     </li>
                     <li>
                     </li>
                     
                    @if(Auth::check()) 
                        <li style="float: right">
                        <p><a href="{{route('users.logout')}}">Logout</a></p>
                        </li>
                        <li style="float: right; margin-right: 5px "><span></span></li>
                        <li style="float: right; margin-right: 5px ">Xin chào,{{ Auth::user()->fullname }}</li>
                        
                    @endif  
                
                  </ul>
               </div>
            </div>
            <div class="container-fluid">
               <div class="hedder-up row">
                  <div class="col-lg-3 col-md-3 logo-head">
                     <h1><a class="navbar-brand" href="{{route('home.index')}}">Toys-Shop</a></h1>
                  </div>
                  <div class="col-lg-5 col-md-6 search-right">
                     <form class="form-inline my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search">
                        <button class="btn" type="submit">Search</button>
                     </form>
                  </div>
                  <div class="col-lg-4 col-md-3 right-side-cart">
                     <div class="cart-icons">
                        <ul>
                           @if(Auth::check()) 
                           <li></li>
                              
                           
                           @else
                           <li>
                           <button type="button" data-toggle="modal" data-target="#exampleModal"> <span class="far fa-user"></span></button>
                           </li>
                           @endif 
                           <li class="toyscart toyscart2 cart cart box_1">
                               
                                <span class="fas fa-cart-arrow-down" id="cart-popover" data-toggle="popover"  data-placement="bottom" title="Shopping Cart"></span>

                                 <div id="popover_content_wrapper" style="display: none">
                                   <span id="cart_details"></span>
                                   <div align="right" style="margin-top: 5px;">
                                       <a href="{{route('home.checkout')}}" class="btn btn-primary" id="check_out_cart" style="float: left;">
                                           <span class="glyphicon glyphicon-shopping-cart"></span> Check out
                                       </a>
                                       <button  class="btn btn-primary" id="clear_cart">
                                          <span class="glyphicon glyphicon-shopping-cart"></span> Clear
                                       </button>
                                   </div>
                                 </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="{{route('home.index')}}">Home <span class="sr-only">(current)</span></a>
                     </li>

                     <li class="nav-item">
                        <a href="{{route('home.shop')}}" class="nav-link">Shop Now</a>
                     </li>
                     @foreach($categories as $category)
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$category->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           @foreach($category->childs as $item)   
                           <a class="nav-link" href="{{route('home.category',$item->id)}}">{{$item->name}}</a>
                           @endforeach
                        </div>
                        
                     </li>
                     @endforeach
                  </ul>
               </div>
            </nav>
         </div>
         
         <!-- Slideshow 4 -->
         
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form action="{{ route('users.login') }}" method="post">
                        @csrf
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="email" placeholder="Your Email" name="email" required="">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="password" name="password" required="">
                           </div>
                           <button type="submit" class="btn subscrib-btnn">Login</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      