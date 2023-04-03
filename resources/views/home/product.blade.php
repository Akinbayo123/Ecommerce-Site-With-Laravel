<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>

       <form action="" class="d-flex">
         <input type="text" class="" name="search" id="" style="color: black;" placeholder="Search for products">
         <input type="submit" value="submit" style="padding:4px 4px 4px 4px!important; height:50px; width:70px; margin-left:10px;" class="btn">
     </form>


       <div class="row">
          @forelse ($data as $product)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ url('details',$product->id) }}" class="option1">
                      Details
                      </a>
                      <form action="{{ url('add_cart',$product->id) }}" method="POST">
                         @csrf
                         <input type="number" name="quantity" value="1" min="1" style="width: 70px">
                         <button type="submit" class="option2 btn" > Add to Cart</button>
                      </form>
                   </div>
                </div>
                <div class="img-box">
                   <img src="{{ asset('storage/'. $product-> image) }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                     {{ $product->title }}
                   </h5>
                   @if($product->discount)
                   <h6 style="text-decoration:line-through;" class="text-danger">
                     ${{ $product->price}}
                   </h6>
                   <h6>
                     ${{ $product->discount }}
                   </h6>
                   @else
                   <h6>
                     ${{ $product->price }}
                   </h6>
                   @endif
                </div>
             </div>
           
          </div>
          @empty
          <h1>No Product found</h1>
          @endforelse
         
       </div>
       <div class="mt-5">
         {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>