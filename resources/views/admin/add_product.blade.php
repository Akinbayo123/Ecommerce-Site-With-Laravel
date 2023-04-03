
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
        <h2> Add Product</h2>
    </div>
   <form action="{{ url('add_products') }}" class="mt-5" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="pt-3">
      <label for="Doctor name">Title</label>
      <input type="text" name="title" class="" style="color: black;" placeholder="Input title">
      @error('title')
      <p class="text-red">{{ $message }}</p>
      @enderror
     </div>
     <div class="pt-3">
      <label for="description">Description</label>
      <input type="text" name="description" class="" style="color: black" placeholder="Input product description">
      @error('description')
      <p class="text-red">{{ $message }}</p>
      @enderror
     </div>
     <div class="pt-3">
      <label for="category">Category</label>
      <select name="category" style="color: black; width:200px" id="">
        <option value="">Select---</option>
        @foreach ($data as $item)
        <option value="{{ $item->product_category }}">{{ $item->product_category }}</option> 
        @endforeach
       
      </select>
      @error('category')
      <p class="text-red">{{ $message }}</p>
      @enderror
     </div>
     <div class="pt-3">
      <label for="text">Price</label>
      <input type="text" name="price" class="" style="color: black" placeholder="Input product price">
      @error('price')
      <p class="text-red">{{ $message }}</p>
      @enderror
     </div>

     <div class="pt-3">
        <label for="text">Discount</label>
        <input type="text" name="discount" class="" style="color: black" placeholder="Input product discount">
        @error('price')
        <p class="text-red">{{ $message }}</p>
        @enderror
       </div>

       <div class="pt-3">
        <label for="text">Quantity</label>
        <input type="text" name="quantity" class="" style="color: black" placeholder="Input product quantity">
        @error('quantity')
        <p class="text-red">{{ $message }}</p>
        @enderror
       </div>

     <div class="pt-3">
      <label for="Doctor Image">Product Image</label>
      <input type="file" name="image" class="" style="color:" placeholder="">
     </div>
     @error('image')
     <p class="text-red">{{ $message }}</p>
     @enderror
     <div class="pt-3">
     
      <input type="submit"  class="btn btn-success mb-4" >
     </div> 
   </form>
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