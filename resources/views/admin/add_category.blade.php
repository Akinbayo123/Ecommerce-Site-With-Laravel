
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
    <div>
        <h2>Add Category</h2>
    </div>
   <form action="{{ url('submit_category') }}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf
     <div class="pt-3">
      <label for="category" class="">Product Category</label>
      <input type="text" name="product_category" class="" style="color: black;" placeholder="Input product category">
      @error('category')
      <p class="text-red">{{ $message }}</p>
      @enderror
     </div>
      <input type="submit"  class="btn btn-success mt-5" >
     
   </form>

   <table class="table table-stripped mt-5">
    <tr class="text-white">   
        <th>Product Category</th>
          <th>Action</th>
    </tr>
  @forelse ($data as $item)
 
         <tr class="text-white">
            <td>{{ $item->product_category }}</td>   
    
            <td><a href="{{ url('delete_cat',$item->id) }}" onclick="return confirm('Are you sure')" class="btn btn-danger">Delete</a></td>
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