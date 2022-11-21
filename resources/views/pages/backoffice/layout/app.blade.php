<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href={{asset("assets/img/favicon.ico")}}>
    <!-- Place favicon.ico in the root directory -->
    
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

    <!-- all css here -->
    <!-- bootstrap v5 css -->
    <link rel="stylesheet" href={{asset("assets/css/bootstrap.min.css")}}>
    <!-- animate css -->
    <link rel="stylesheet" href={{asset("assets/css/animate.min.css")}}>
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href={{asset("assets/css/jquery-ui.min.css")}}>
    <!-- meanmenu css -->
    <link rel="stylesheet" href={{asset("assets/css/meanmenu.min.css")}}>
    <!-- nivo-slider css -->
    <link rel="stylesheet" href={{asset("assets/lib/css/nivo-slider.css")}}>
    <link rel="stylesheet" href={{asset("assets/lib/css/preview.css")}}>
    <!-- slick css -->
    <link rel="stylesheet" href={{asset("assets/css/slick.min.css")}}>
    <!-- lightbox css -->
    <link rel="stylesheet" href={{asset("assets/css/lightbox.min.css")}}>
    <!-- material-design-iconic-font css -->
    <link rel="stylesheet" href={{asset("assets/css/material-design-iconic-font.css")}}>
    <!-- All common css of theme -->
    <link rel="stylesheet" href={{asset("assets/css/default.css")}}>
    <!-- style css -->
    <link rel="stylesheet" href={{asset("assets/style.css")}}>
    <!-- shortcode css -->
    <link rel="stylesheet" href={{asset("assets/css/shortcode.css")}}>
    <!-- responsive css -->
    <link rel="stylesheet" href={{asset("assets/css/responsive.css")}}>
    <!-- modernizr css -->
    <script src={{asset("assets/js/vendor/modernizr-3.11.2.min.js")}}></script></head>
<body>
    @include('pages.backoffice.partials.nav')
    @include('layout.flash')
    @yield('content-backoffice')

    		<!-- all js here -->
		<!-- jquery latest version -->
		<script src={{asset("assets/js/vendor/jquery-3.6.0.min.js")}}></script>
		<script src={{asset("assets/js/vendor/jquery-migrate-3.3.2.min.js")}}></script>
		<!-- bootstrap js -->
		<script src={{asset("assets/js/bootstrap.bundle.min.js")}}></script>
		<!-- jquery.meanmenu js -->
		<script src={{asset("assets/js/jquery.meanmenu.js")}}></script>
		<!-- slick.min js -->
		<script src={{asset("assets/js/slick.min.js")}}></script>
		<!-- jquery.treeview js -->
		<script src={{asset("assets/js/jquery.treeview.js")}}></script>
		<!-- lightbox.min js -->
		<script src={{asset("assets/js/lightbox.min.js")}}></script>
		<!-- jquery-ui js -->
		<script src={{asset("assets/js/jquery-ui.min.js")}}></script>
		<!-- jquery.nivo.slider js -->
		<script src={{asset("assets/lib/js/jquery.nivo.slider.js")}}></script>
		<script src={{asset("assets/lib/home.js")}}></script>
		<!-- jquery.nicescroll.min js -->
		<script src={{asset("assets/js/jquery.nicescroll.min.js")}}></script>
		<!-- countdon.min js -->
		<script src={{asset("assets/js/countdon.min.js")}}></script>
		<!-- wow js -->
		<script src={{asset("assets/js/wow.min.js")}}></script>
		<!-- plugins js -->
		<script src={{asset("assets/js/plugins.js")}}></script>
		<!-- main js -->
		<script src={{asset("assets/js/main.js")}}></script>
</body>
</html>