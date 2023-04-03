<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <base href="/public">
      <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css" />
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
     
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         <div class="heading_container heading_center">
            <h2>
               Product details
            </h2>
         </div>
  
         <div class="container">
            <div class="row d-flex">
                <div class="col-lg-4 col-md-4 col-sm-6" style="margin: auto; width:50%; padding:30px;">
                    <div class="img-box">
                        <img src="{{ asset('storage/'. $products-> image) }}"  alt="">
                        <div class="detail-box ">
                        <h5 class="fw-bold" style="font:bold !important">{{ $products->title }}</h5>
                        @if($products->discount)
                        <h6 class="text-primary">
                            Discount Price <br>
                            ${{ $products->discount }}
                        </h6>
                        <h6 class="text-danger" style="text-decoration: line-through">
                            Price <br>
                            ${{ $products->price }}
                        </h6>
                        @else
                        <h6 class="text-primary">
                           Discount Price <br>
                           ${{ $products->price }}
                       </h6>
                       @endif
                        <h6 class="mt-2"  >
                            <span style="font-size:15px">Product Category:</span>
                            {{ $products->category }}
                        </h6>
                        <h6 class="mt-3" >
                            Product Description:
                            {{ $products->description }}
                        </h6>
                        <h6 class="mt-3" >
                            Available Quantity:
                            {{ $products->quantity }}
                        </h6>
                        <form action="{{ url('add_cart',$products->id) }}" method="POST" class="mt-3">
                           @csrf
                           <input type="number" name="quantity" value="1" min="1" style="width: 70px">
                           <button type="submit" class=" btn btn-success text-black" > Add to Cart</button>
                        </form>
                    </div>
                    </div>
                   
                     
                         
                     </div>
                     
                  
                </div>
            </div>
        </div>
         <!-- end slider section -->
      </div>
 



      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="home/images/logo.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                        <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                        <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">About</a></li>
                           <li><a href="#">Services</a></li>
                           <li><a href="#">Testimonial</a></li>
                           <li><a href="#">Blog</a></li>
                           <li><a href="#">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Register</a></li>
                           <li><a href="#">Shopping</a></li>
                           <li><a href="#">Widget</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Newsletter</h3>
                        <div class="information_f">
                          <p>Subscribe by our newsletter and get update protidin.</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>