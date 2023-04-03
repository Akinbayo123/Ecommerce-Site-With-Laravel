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
               My Orders
            </h2>
         </div>
         <table class="table table-stripped mt-5 p-3">
            <tr class="text-black">
                @php
                $serial_no=1;
                @endphp   
                <th>#Serial No</th>
                <th>Product Name</th>
                  <th>Product Quantity</th>
                  <th>Price</th>
                  <th>Product Image</th>
                  <th>Payment Status</th>
                  <th>Delivery Status</th>
                  <th>Action</th>
            </tr>
          @forelse ($order as $item )
         
                 <tr class="text-black">
                    <td>{{ $serial_no++ }}</td> 
                    <td>{{ $item->title }}</td> 
                    <td>{{ $item->quantity }}</td>   
                    <td>${{ $item->price }}</td> 
            <td><img src="{{ asset('storage/'. $item-> image) }}" style="height: 50px" alt=""></td>
            @if ($item->delivery_status=="Processing") 
            <td>{{ $item->payment_status }}</td>  
            @elseif($item->payment_status=="Cancelled")
            <td>{{ $item->payment_status }}</td> 
            @else
            <td>Received</td>
            @endif
      
            
            @if ($item->delivery_status=="Processing") 
                <td class="btn btn-warning mt-2">{{ $item->delivery_status }}</td> 
                @elseif($item->delivery_status=="Cancelled")
                    <td class="btn btn-danger mt-2">{{ $item->delivery_status }}</td>    
            @else
                <td class="btn btn-success mt-2">{{ $item->delivery_status }}</td>  
            @endif
         
            @if ($item->payment_status=="Cash on delivery")
                    <td><a href="{{ url('cancel',$item->id) }}" class="btn btn-success" style="margin-right:10px;">Cancel Order</a> </td>
            @elseif($item->payment_status=="Cancelled")
                    <td>Cancelled</td>
            @else
             <td>Delivered </td>
             @endif
                </tr>
                @empty
                
                <tr class="text-white text-center">
                    <td><h2>No Data found</h2></td>   
                </tr>
                @endforelse
        </table>
        
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