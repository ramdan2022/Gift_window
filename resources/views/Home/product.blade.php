<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('/Product_Details',$product->id)}}" class="option1">
                           Product Details
                           </a>
                          
                           <form action="{{url('Add_cart',$product->id)}}" method="post">
                              @csrf

                           <div class="row">

                           <div class="col-md-4">

                              <input type="number" name="Quantity" value="1"
                              min="1" style="width: 100px;" >

                           </div>

                           <div class="col-md-4">

                              <input type="submit" value="add to cart">

                           </div>


                           </div>

                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{URL::to('/product/'.$product->Image )}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->Title}}                          
                        </h5>
                        
                        @if($product->Discount_price != null)
                        
                        <h5  style="text-decoration:line-through;color:blueviolet">
                        Price
                        <br>
                        {{$product->Price}}</h5>

                        <h5 style="color: red;">  
                        Discount_price
                        <br>
                           {{$product->Discount_price}}</h5>
                        @else
                        
                         <h5 style="color: red;">
                         Price
                         <br>
                           {{$product->Price}}</h5>

                         @endif
                     </div>
                  </div>
               </div>
                
               @endforeach

               <div class="paginator">
               {!! $products->links() !!}
               </div>
             
 </div>
         </div>
      </section>