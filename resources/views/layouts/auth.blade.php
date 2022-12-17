<!DOCTYPE html>
<html lang="{{ App::isLocale('ar') }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>

    <title>{{ $siteSetting['site_name']->value }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Type some info">
    <meta name="author" content="Type name">


    <!-- Bootstrap css -->
    <link href="{{ asset('css/site-bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom css -->
    <link href="{{ asset('css/site.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/site-responsive.css') }}" rel="stylesheet" type="text/css">

  <!-- Font awesome 5 -->
</head>

<body class="bg-light" style="height: 100vh; padding-top:10rem">

{{-- <section class="padding-top"> --}}
<div class="container ">

	@yield('content')

</div>
{{-- </section> --}}

</body>