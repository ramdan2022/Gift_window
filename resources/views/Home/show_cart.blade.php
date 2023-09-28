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
      <style type="text/css">

      .div_center
        {
           text-align: center;
           padding-top: 40px;
        }

      .center
        {
          margin:auto;
          width: 50%;
          margin-top: 30px;
          text-align: center;
          border: 3px solid black;
        }

         .th_color
      {
        background-color:red;
      }

      .price_font
      {
        font-size: 30px;
        padding-bottom: 10px;
      }
        </style>
   </head>
   <body>
      <div>
         <!-- header section strats --> 
         @include('Home\Header')
         <!-- end header section -->
         
         <!-- product details -->
         
         @php
         $finalprise = 0;
         @endphp

        </div>  

              @if(session()->has('massege'))

              <div class="alert alert-sueccess">

              {{session()->get('message')}}
              
            </div>
            
            @endif


                      <div class="div_center">
                        <table class="center" >
        
                        <tr class="th_color">
                          <td>Order Name</td>
                          <td>price</td>
                          <td>Quantity</td>
                          <td>Image</td>
                          <td>Action</td>
                          
                        </tr>


        
                        @foreach($carts as $cart)

                        @php
                        
                        $finalprise += $cart->Price; 
                        @endphp

                        <tr>
                          <td>{{$cart->product_title}}</td>
                          <td>{{$cart->Price}}</td>
                          <td>{{$cart->Quantity}}</td>
                          <td>
                          <img height="120" width="120" src="product/{{$cart->Image}}">
                          </td>
                          
                          <td><a href="{{url('del_item',$cart->id)}}"
                           onclick="return confirm('Are you sure to delete this item')"
                           class="btn btn-danger">
                            remove</a></td>
                        </tr>
                        @endforeach
        
                      </table>
                      
                      <br>
  
                    <h6 class="price_font">Totall price :{{$finalprise}} </h6>

                    <a class="btn btn-danger" href="{{url('cash_deliver')}}">Cash On Deliver</a>
                      
                    <a class="btn btn-danger" href="{{url('stripe',$finalprise)}}">Pay Using Card</a>
                    </div>
                    

         
</div>
    
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
</html>
  
  
  
  