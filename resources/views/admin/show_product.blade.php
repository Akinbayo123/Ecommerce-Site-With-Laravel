
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
   
  <h2 class="text-center">Available Products</h2>

   <table class="table table-stripped mt-5">
    <tr class="text-white">   
        <th>Title</th>
          <th>Price</th>
          <th>Product Image</th>
          <th>Action</th>
    </tr>
  @forelse ($data as $item)
 
         <tr class="text-white">
            <td>{{ $item->title }}</td>   
            <td>{{ $item->price}}</td>   
    <td><img src="{{ asset('storage/'. $item-> image) }}" alt=""></td>
            <td><a href="{{ url('edit_pro',$item->id) }}" class="btn btn-success" style="margin-right:10px;">Edit</a><a href="{{ url('delete_pro',$item->id) }}" onclick="return confirm('Are you sure')" class="btn btn-danger">Delete</a></td>
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