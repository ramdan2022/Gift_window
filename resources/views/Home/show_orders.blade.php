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

      th{
         border: 1px solid black;
        border-collapse: collapse;
      }
      td{
        border: 1px solid black;
        border-collapse: collapse;
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


                      <div class="div_center">
                        <table class="center" >
        
                        <tr class="th_color">
                          <th>product_title</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Image</th>
                          <th>Delivery_status</th>
                          <th>Action</th>
                          
                        </tr>
      
                        @foreach($orders as $order)

                       
                        <tr>
                          <td>{{$order->product_title}}</td>
                          <td>{{$order->Price}}</td>
                          <td>{{$order->Quantity}}</td>
                          <td>
                          <img height="120" width="120" src="product/{{$order->Image}}">
                          </td>

                          <td>{{$order->Delivery_status}}</td>
                          
                          @if($order->Delivery_status == 'order is canceled')

                          <td> NO Action</td>
                          @else
                          <td><a href="{{url('cancel_order',$order->id)}}"
                           onclick="return confirm('Are you sure to cancel this order')"
                           class="btn btn-danger">
                            Cancel order</a></td>
                            @endif
                        </tr>
                        @endforeach
        
                      </table>
                      
                      <br>
  
                   
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
  
  
  
  