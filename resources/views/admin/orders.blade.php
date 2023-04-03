
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')

   <style>
     label{
       display: inline-block;
       width: 200px;
     }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="container" style="padding-top:100px;" align="center">
   
  <h2 class="text-center">Available Orders</h2>

<form action="">
    <input type="text" name="search" id="" style="color: black;">
    <input type="submit" value="submit" class="btn btn-success">
</form>

   <table class="table table-stripped mt-5">
    <tr class="text-white">   
        <th>Name</th>
          <th>Product Name</th>
          <th>Product Image</th>
          <th>Payment Status</th>
          <th>Delivery Status</th>
          <th>Action</th>
    </tr>
  @forelse ($data as $item)
 
         <tr class="text-white">
            <td>{{ $item->name }}</td> 
            <td>{{ $item->title }}</td>   
             
    <td><img src="{{ asset('storage/'. $item-> image) }}" alt="" class="" style=""></td>
    @if ($item->delivery_status=="Processing") 
    <td>{{ $item->payment_status }}</td>  
    @elseif($item->delivery_status=="Cancelled")
    <td>{{ $item->payment_status }}</td> 
    @else
    <td>Received</td>
    @endif
    
    @if ($item->delivery_status=="Processing") 
        <td class="badge badge-outline-warning mt-2">{{ $item->delivery_status }}</td>  
        @elseif($item->delivery_status=="Cancelled")
        <td class="badge badge-outline-danger mt-2">{{ $item->delivery_status }}</td>  
    @else
        <td class="badge badge-outline-success mt-2">{{ $item->delivery_status }}</td>  
    @endif
    @if ($item->delivery_status=="Processing")
            <td><a href="{{ url('order_delivered',$item->id) }}" class="btn btn-success" style="margin-right:10px;">Order Delivered</a></td>
            @elseif($item->delivery_status=="Cancelled")
            <td>{{ $item->delivery_status }}</td> 
     @else
     <td>Delivered <a href="{{ url('print_pdf',$item->id) }}" class="btn btn-primary" style="margin-right:10px;">Print Pdf</a></td>
     @endif
        </tr>
        @empty
        
        <tr class="text-white text-center">
            <td><h2>No Data found</h2></td>   
        </tr>
        @endforelse
</table>

  </div>
</div>




        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
  @include('admin.script')
  </body>
</html>