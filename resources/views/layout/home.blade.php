<!DOCTYPE html>
<!--
Template Name: Besloor
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Besloor</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{url('public/home')}}/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@yield('css')
</head>
<body id="top">
    <!-- HEADER -->
    <x-home.header />
    <!-- /HEADER -->
    	@yield('main')
    <!-- FOOTER -->
    <x-home.pooter />
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{url('public/home')}}/layout/scripts/jquery.min.js"></script>
    <script src="{{url('public/home')}}/layout/scripts/jquery.backtotop.js"></script>
    <script src="{{url('public/home')}}/layout/scripts/jquery.mobilemenu.js"></script>

    
    @yield('js')
</body>

</html>