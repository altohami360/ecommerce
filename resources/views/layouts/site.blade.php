<html lang="en"><head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Type some info">
  <meta name="author" content="Type name">

  <title>Website layout sample </title>

  <!-- Bootstrap css -->
  <link href="{{ asset('css/site-bootstrap.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom css -->
  <link href="{{ asset('css/site.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/site-responsive.css') }}" rel="stylesheet" type="text/css">

  <!-- Font awesome 5 -->
  

</head>
<body class="bg-light">

@include('layouts.components.site.header')
<section class="padding-top">
<div class="container">

	@yield('content')

</div>
</section>


@include('layouts.components.site.footer')

{{-- 
<!-- Bootstrap js -->
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Custom js -->
<script src="js/script.js?v=2.0"></script> --}}
</body>
</html>