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
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <base href="http://localhost/laravel/auth-jetstream/public/">
      <link rel="stylesheet" type="text/css" href="Home/css/bootstrap.css" />
  
      <!-- font awesome style -->
      <link href="Home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="Home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="Home/css/responsive.css" rel="stylesheet" />
      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats --> 
         @include('Home\Header')
         <!-- end header section -->

         <!-- product details -->
          <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:70%; 
          padding:30px;">
                 
                     <div class="img-box">
                        <img style="margin: auto; width:100%; height:100%"
                         src="{{URL::to('/product/'.$product->Image )}}" alt="">
                     </div>
                     <div class="detail-box">
                       
                        <h5>{{$product->Title}}</h5>
                           
                        
                        
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

                                 <h6>Description: {{$product->Description}}</h6>
                                 <h6>Catagory: {{$product->Catagory}}</h6>
                                 <h6>Quantity: {{$product->Quantity}}</h6>    
                                 <br>
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
      <!-- footer start -->
      @include('Home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="Home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="Home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="Home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="Home/js/custom.js"></script>
   </body>
</html>Home/