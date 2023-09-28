<!DOCTYPE html>
<html lang="en">
    <head>
    
      <!-- bootstrap core css -->
      <base href="http://localhost/laravel/auth-jetstream/public/">
      
  
      <!-- font awesome style -->
     @include('admin.Css')

      
       
          
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

      
           
  
 
  
          <h2 class="h2_fonts"> Email Details</h2>
          
        <form action="{{url('send_email',$order->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="div_design">
            <label>Email Greeting</label>
          <input type=text placeholder="greeting" 
           name="greeting" class="input_color" required></input>
          </div> 

          <div class="div_design">
            <label>First Line</label>
          <input type=text placeholder="First line" 
           name="first_line" class="input_color" required</input>
          </div> 

          <div class="div_design">
            <label>Email Body</label>
          <input type=text placeholder="Body" 
           name="body" class="input_color" required></input>
          </div> 

          <div class="div_design">
            <label>Button Name</label>
          <input type="text"  placeholder="button" 
           name="button" class="input_color" ></input>
          </div> 

          
          <div class="div_design">
              <label>URL</label>
              <input type="text"  placeholder="URL" 
              name="url" class="input_color" ></input>
            </div> 

          <div class="div_design">
            <label>Last Line</label>
          <input type=text placeholder="Last line" 
           name="last_line" class="input_color" required></input>
          </div> 
        

            <div class="div_design">
                <input type="submit" class="btn btn-primary" value=" Send Email"></input>
              </div>
            </div>
  </form>  
</div>

        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin\script')
    <!-- End custom js for this page -->
  </body>
</html>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.Script')
    </body>
</html>
<script src="{{asset('admin/assets/js/bootstrap.bundle.min')}}"></script>
