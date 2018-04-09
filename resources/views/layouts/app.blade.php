<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
       <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Product manager') }}</title>

    <!-- Styles -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!--  Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<!--latest angular -->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="js/controllers/prodCtrl.js"></script> <!-- load our controller -->
<script src="js/services/productService.js"></script> <!-- load our service -->
<script src="js/app.js"></script> <!-- load our application -->

  
</head>
<body class="container" ng-app="productApp" ng-controller="ProductController">
    <div id="app">
        @include('layouts.navigation')

        @yield('content')
    </div>

    <!-- Scripts -->

    <!-- Angular library -->



</body>
</html>
