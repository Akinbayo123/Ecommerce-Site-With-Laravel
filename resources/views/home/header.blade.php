<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html"><img width="250" src="home/images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ url('redirect') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>
                
                @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('my_orders') }}">Orders</a>
               </li> 
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="ms-auto"></div>
         <div class="navbar-nav">
             <a href="{{ url("cart") }}" class="nav-item nav-link active">
                 <h5 class="px-5 cart ">
                     <i class="fas fa-shopping-cart"></i> Cart
                    
                     <span id="cart_count" class=" bg-light" style="color: #f7444e;">{{ $product->count() }}</span>
                 </h5>
             </a>
         </div>
     </div>
   
                <li class="nav-item">
                    <x-app-layout></x-app-layout>
                   </li>
                   @else
                <li class="nav-item">
                    <a class="btn btn-primary me-4" href="{{ route('login') }}" style="margin-right: 10px">Login</a>
                 </li>
                 <li class="nav-item">
                    <a class="btn btn-success " href="{{ route('register') }}">Register</a>
                 </li>
                 @endauth
               
             </ul>
          </div>
       </nav>
    </div>
 </header>