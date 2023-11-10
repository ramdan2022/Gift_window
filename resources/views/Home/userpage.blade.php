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
         <!-- slider section -->
       @include('Home\slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('Home\why_section')
      <!-- end why section -->
      
      <!-- arrival section -->
    
      <!-- end arrival section -->
      
      <!-- product section -->
      <div style="padding-left:30px; text-align:center">
         <form action="{{url('Search_product')}}" method="get">
            @csrf
            
            <input style="width:300px;" type="text" name="search" placeholder="place product name or price">
         </input>
            
            <input type="submit" value="search" ></input>
         </form>
    </div>
      @include('Home\product')
      <!-- end product section -->
      @include('Home\subscribe')
      <!-- subscribe section -->
    
      <!-- end subscribe section -->
      <!-- client section -->
    @include('Home\footer')
      <!-- end client section -->
      <!-- footer start -->
     
      
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