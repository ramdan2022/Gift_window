<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   
   @include('admin.Css')

      <style type="text/css">
        .div_center
        {
           text-align: center;
           padding-top: 40px;
        }

        .h2_font
        {
            font-size: 30px;
            padding-bottom: 40px;
        }

        .input_color
        {
          color: black;
        }
       
        .center
        {
          margin:auto;
          width: 50%;
          margin-top: 30px;
          text-align: center;
          border: 3px solid white;
        }

      
      </style>
    <!-- End layout styles -->
    
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

            <!-- <button type="button" class="avgrund-close" data-dismiss="alert" aria-hidden="true">*</button> -->

              {{session()->get('message')}}

             

            </div>

            @endif    

             <div class="div_center">

              <h2 class="h2_font">ADD Category</h2>

              <form action="{{url('/add_category')}}" method="post">
                @csrf

              <input type="text" name="name" placeholder="write category name"
               class="input_color">

              <input type="submit" name="submit" value="add_category" 
              class="btn btn-primary">


                </form>
                
              </div>  
                <div >
                  <table class="center">

                  <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                  </tr>

                  @foreach($Data as $data)
                  <tr>
                    <td>{{$data->category_name}}</td>
                    <td><a href="{{url('category_delete',$data->id)}}"
                     onclick="return confirm('Are you sure to delete this category')"
                     class="btn btn-danger">
                      Delete</a></td>
                  </tr>
                  @endforeach

                  </table>
                </div>


          </div>

        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin\script')
    <!-- End custom js for this page -->
  </body>
</html>