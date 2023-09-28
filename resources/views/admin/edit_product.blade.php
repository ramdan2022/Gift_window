<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
 <!-- plugins:css -->
  <link rel="stylesheet"
            href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">

     <link rel="stylesheet"
            href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css')}}" >
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link
            rel="stylesheet"
            href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css')}}"
        >
        <link
            rel="stylesheet"
            href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}"
        >
        <link
            rel="stylesheet"
            href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}"
        >
        <link
            rel="stylesheet"
            href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min')}}"
        >

        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="admin/assets/css/style.css" />
        <!-- End layout styles -->
        <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
   
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    
     <!-- import bootstrape css -->
     <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">

      
    <style>

    .h2_fonts
    {
        font-size: 40px;
        padding-bottom: 40px;
        color: aliceblue;
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
        color: aliceblue;
        font-size: large;
    }

    .div_design
    {
        padding-bottom: 20px;
    }

    .page_color
    {
      background-color:darkslategray;
      
    }

   

    

    
    </style>
    
  </head>
  <body>

  
    
    
       <div class="page_color">


        <div class="div_center">

        @if(session()->has('message'))

        <div class="alert alert-success">

        {{session()->get('message')}}
           
  </div>
  @endif



          <h2 class="h2_fonts"> EDIT Product</h2>
        <form action="{{url('/update_product',$product->id)}}"
             method="post" enctype="multipart/form-data">
             
             @csrf
             @method('PUT')
          <div class="div_design">
            <label>Title</label>
          <input type=text placeholder="product name" 
           name="title" value="{{$product->Title}}" class="input_color" required></input>
          </div> 

          <div class="div_design">
            <label>Description</label>
          <input type=text placeholder="product description" 
           name="description" value="{{$product->Description}}" class="input_color" required</input>
          </div> 

          <div class="div_design">
            <label>quantity</label>
          <input type=number placeholder="product quantity" 
           name="quantity"value="{{$product->Quantity}}" class="input_color" required></input>
          </div> 

          <div class="div_design">
            <label>Price</label>
          <input type="number" min="0" placeholder="product price" 
           name="price" value="{{$product->Price}}" class="input_color" ></input>
          </div> 

          
          <div class="div_design">
              <label>Discount price</label>
              <input type="number" min="0" placeholder="D_price" 
              name="discount_price"  value="{{$product->Discount_price}}" class="input_color" ></input>
            </div> 
            
              <div class="div_design">
                <label>category</label>
                <select class="input_color" name="category" required>
                  <option value="" selected="">{{$product->Catagory}}</option>
                  
                @foreach($categories as $category)
                <option name="category" value="{{$category->category_name	}}">
                  {{$category->category_name}}
                </option>
                    @endforeach
                </select>
                </div>

             <div class="div_design">
                  
             
                <label>Current Image</label>
                
               
                <img height="100" width="100" src="{{URL::to('/product/'. $product->Image)}}" >
                
              </div> 
                  
              
                
                <div class="div_design">
                  
             
                <label>Image</label>
                
               
                <input type="file" name="image" class="input color"></input>
              </div> 

             
              

            <div class="div_design">
                <input type="submit" class="btn btn-primary" value=" Update Product"></input>
              </div>
            </div>
  </form>  


        </div>
   
    
 
  
      </div> 
  </body>
</html>
