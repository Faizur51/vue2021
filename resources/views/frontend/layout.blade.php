
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.hasthemes.com/sinrato-preview/sinrato/blog-right-sidebar-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 03:56:55 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Page Title -->
    <title>Blog</title>
    <!--Fevicon-->
    <link rel="icon" href="assets/img/icon/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{mix('css/style.css')}}">
</head>
<body>
<div id="app">
<!-- header area start -->
<myheader></myheader>
<!-- header area end -->

<!-- blog wrapper start -->
<div class="blog-area-wrapper pt-30 pb-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-wrapper-inner">
                  <router-view></router-view>
                </div>
            </div>
            <div class="col-lg-3">
              <sidebar></sidebar>
            </div>
        </div>
    </div>
</div>
<!-- blog wrapper end -->

<!-- scroll to top -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div> <!-- /End Scroll to Top -->

<!-- footer area start -->
<myfooter></myfooter>
<!-- footer area end -->
<!-- all js include here -->
</div>

<script src="{{mix('js/style.js')}}"></script>
<script src="{{mix('js/app2.js')}}"></script>
</body>

<!-- Mirrored from demo.hasthemes.com/sinrato-preview/sinrato/blog-right-sidebar-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Apr 2021 03:56:55 GMT -->
</html>
