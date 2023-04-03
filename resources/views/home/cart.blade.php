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
  
         
         <div class="container-fluid">
            <div class="row px-5">
              
                <div class="col-md-7">
                 @php
                   $total_price=0;
                   $items=0;  
                 @endphp
                    <div class="shopping-cart">    
                        <hr> 
                        @unless (count($product)==0)
                           
                        @foreach ($product as $products) 
                                <form action="{{ url('update_cart',$products->id) }}" method="POSt" class="cart-items">
                                   @csrf
                                    <div class="border rounded">
                                        <div class="row bg-white">
                                            <div class="col-md-3 pl-0">
                                                <img src="{{ asset('storage/'. $products-> image) }}" alt="Image1" class="img-fluid">
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="pt-2">{{ $products->title }}</h5>
                                                <small class="text-secondary">Seller: dailytuition</small>
                                                <h5 class="pt-2 mt-3 mb-3">${{ $products->price }}</h5>
                                                <a href="{{ url('remove_cart',$products->id) }}" class="btn btn-danger">Remove</a>
                                              
                                            </div>
                                            <div class="col-md-3 py-5 ">
                                                <div class="d-flex">
                                                    <input type="number" min="1" name="quant" value="{{ $products->quantity }}" id="quant" class="form-control w-25 d-inline" style="width:50px!important;">
                                                   
                                                    <input type="submit" name="add" value="Update" class="btn btn-primary ms-3"style="padding:10px 10px!important; height:40px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </form>

                                 @php
                                 $total_price=$total_price + $products->price;
                                 $items=$items + $products->quantity;
                               @endphp

                                 @endforeach
                                 @else
                                 <p class="h2">Cart is empty!!!</p>
                                 @endunless
                    </div>
                 
                </div>
               
                <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
    
                    <div class="pt-4">
                        <h6>PRICE DETAILS</h6>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-6">
                              <h6>Price ( {{ $items}} items)</h6>
                              <hr>
                                <h6>Delivery Charges</h6>
                                <hr>
                                <h6>Amount Payable</h6>
                                <hr>
                                <h6 class="pb-3 pt-3">Proceed to payment</h6>
                            </div>
                            <div class="col-md-6">
                                <h6>${{ $total_price }}</h6>
                                <h6 class="text-success">FREE</h6>
                                <hr>
                                    <h6>
                                       ${{ $total_price }}
                                        </h6>
                                        <hr>
                                        @if(count($product)!==0)
                                        <h6 class="d-flex pb-3 pt-3">
                                           <a href="{{ url('cash_pay') }}" class="btn btn-success"style="padding:10px 10px!important; height:40px; margin-right:5px;">Cash Pay</a>
                                           <a href="{{ url('card_pay',$total_price) }}"class="btn btn-primary"style="padding:10px 10px!important; height:40px">Card Pay</a>
                                        </h6>
                                        @endif
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