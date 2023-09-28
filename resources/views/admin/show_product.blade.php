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
        width: 80%;
        text-align: center;
      }
      .h2_center
      {
        text-align: center;
        font-size: 40px;
         
      }
      .img_size
      {
        width: 150px;
        height: 150px;
      }
      .th_color
      {
        background-color:dodgerblue;
      }

    </style>
    
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

             @if(session()->has('message'))

             <div class="alert alert-success">

             {{session()->get('message')}}

    </div>
    @endif


              
              <h2 class="h2_center">All Product</h2>  

                <table class="table_center">

                <tr class="th_color">
                  <th>Product title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Discount_price</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>

                @foreach($products as $product)
                  <tr>
                    <td>{{$product->Title}}</td>
                    <td>{{$product->Description}}</td>
                    <td>{{$product->Catagory}}</td>
                    <td>{{$product->Price}}</td>
                    <td>{{$product->Discount_price}}</td>
                    <td>{{$product->Quantity}}</td>
                    <td>
                      <img class="img_size" src="product/{{$product->Image}}">
                    </td>
                    <form action="{{url('/product_delete',$product->id)}}" method="post">
                      @method('delete')
                      @csrf
                    <td><button type="submit"onclick="return confirm('Are you sure you want to delete')"
                    class="btn btn-danger">Delete</button></td>
                    </form>
                    <td><a  href="{{url('edit_product',$product->id)}}" class="btn btn-primary">edit</a></td>

                  </tr> 
                  @endforeach             
                </table>

       
             </div>
       </div>     
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin\script')
    <!-- End custom js for this page -->
  </body>
</html>