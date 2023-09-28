<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
   @include('admin\Css')
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <style type="text/css">
      .table_center
      {
        margin: auto;
        margin-top: 40px;
        border: 2px solid white;
        width: 100%;
        text-align: center;
      }
      .h2_center
      {
        text-align: center;
        font-size: 40px;
         
      }
      .img_size
      {
        width: 50px;
        height: 50px;
      }
      .th_color
      {
        background-color:slategrey;
      }
      th{
      border: 1px solid slategrey;
      border-collapse: collapse;
      }

       td{
      border: 1px solid slategrey;
      border-collapse: collapse;
      }

    </style>
  d
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin\Slider')
      <!-- partial -->
     @include('admin\Header')
        <!-- partial -->
       <div class="main-panel">
             <div class="content-wrapper">

          


              
              <h2 class="h2_center">All Orders</h2>  



              <div style="padding-left: 40%; padding-Top:30px;">
                <form method="get" action="{{url('/search')}}">
                @csrf
                <input class="btn btn-primary" type="submit" value="search"></input>

                <input style="color: black;"  type="text" name="search"></input>
                
              </form>
    </div>

                <table class="table_center">

                <tr class="th_color">
                  <th>name</th>
                  <th>phone</th>
                  <th>email</th>
                  <th>address</th>
                  <th>product_title</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Image</th>             
                  <th>Payment_status</th>
                  <th>Delivery_status</th>
                  <th>Delivered</th>
                  <th>Send_Email</th>
    </tr>

                @forelse($orders as $order)

                 <tr>
                  <td>{{$order->name}}</td>
                  <td>{{$order->phone}}</td>

                  <td>{{$order->email}}</td>
                  <td>{{$order->address}}</td>
                  
                  <td>{{$order->product_title}}</td>
                  <td>{{$order->Price}}</td>
                  <td>{{$order->Quantity}}</td>
                  <td>
                    <img class="img_size" src="product/{{$order->Image}}">
                </td>
                  
                  <td>{{$order->Payment_status}}</td>
                  <td>{{$order->Delivery_status}}</td>
                  <td>
                 @if($order->Delivery_status=='proccesing')

                  <a href="{{url('deliverd',$order->id)}}" class="btn btn-primary">
                      delivered
                  </a>

                    @else
                    
                    <p style="color: blue;">delivered</p>

                    @endif  
                  </td>

                  <td><a class="btn btn-success" href="{{url('email_inf',$order->id)}}">
                    Send</a>
                  </td>
                    
                </tr>

             @empty

             <td colspan="12" >Not Found</td>
             
              @endforelse       
                    </td>   
                  </tr> 
                          
                </table>

       
             </div>
       </div>     
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin\script')
    <!-- End custom js for this page -->
  </body>
</html>