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

    <style>

    .h2_fonts
    {
        font-size: 40px;
        padding-bottom: 40px;
    }  

    .div_center
    {
        text-align: center;
        padding-top: 40px;
    }

    .input_color
    {
        
        color:black;
        padding-bottom: 20px;
    }
    label
    {
        display: inline-block;
        width: 150px;
    }

    .div_design
    {
        padding-bottom: 20px;
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

        <div class="div_center">

        @if(session()->has('message'))

        <div class="alert alert-success">

        {{session()->get('message')}}
           
  </div>
  @endif
  
  



          <h2 class="h2_fonts"> ADD Product</h2>
          
        <form action="{{url('/AddProduct')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="div_design">
            <label>Title</label>
          <input type=text placeholder="product name" 
           name="title" class="input_color" required></input>
          </div> 

          <div class="div_design">
            <label>Description</label>
          <input type=text placeholder="product description" 
           name="description" class="input_color" required</input>
          </div> 

          <div class="div_design">
            <label>quantity</label>
          <input type=number placeholder="product quantity" 
           name="quantity" class="input_color" required></input>
          </div> 

          <div class="div_design">
            <label>Price</label>
          <input type="number" min="0" placeholder="product price" 
           name="price" class="input_color" ></input>
          </div> 

          
          <div class="div_design">
              <label>Discount price</label>
              <input type="number" min="0" placeholder="D_price" 
              name="discount_price" class="input_color" ></input>
            </div> 
            
            
            <div class="div_design">
                <label>category</label>
                <select class="input_color" name="category" required>
                  <option value="" selected="">Add category here</option>
                  
                @foreach($categories as $category)
                <option name="category" value="{{$category->category_name	}}">
                  {{$category->category_name}}
                </option>
                    @endforeach
                </select>
                </div>
                
                <div class="div_design">
                  <label>Image</label>
                <input type="file" name="image" class="input_color"></input>
              </div> 

            <div class="div_design">
                <input type="submit" class="btn btn-primary" value=" Add product"></input>
              </div>
            </div>
  </form>  


        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin\script')
    <!-- End custom js for this page -->
  </body>
</html>