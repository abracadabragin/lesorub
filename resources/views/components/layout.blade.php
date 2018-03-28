<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no, maximum-scale=1.0"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="address=no"/>
    <meta name="description" content="Строительная компания 'Лесоруб' занимает высокую
    ступень рынка загородного домостроения. Компания 'Лесоруб' занимается
    проектированием, производством и строительством домов из бруса, каркасных домов
    с учетом русских традиций домостроения и применения новейших технологий."/>
    <meta name="keywords" content="строительная компания, лесоруб, дом, дома, баня, каркасный дом, качественные материлы, гарантия, фундамент, отделка, сваи"/>
    <meta name="author" content="mr.progin@yandex.ru"/>
    <meta name="copyright" content="© Лесоруб, 2013-2018. Все права защищены."/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield('title')</title>

    <link rel='icon' href='{{ URL::asset('favicon.ico') }}'>
    <link rel='stylesheet' href='{{URL::asset('css/normalize.css')}}'>
    <link rel='stylesheet' href='{{URL::asset('css/app.css')}}'>
    <link rel='stylesheet' href='{{URL::asset('css/styles.css')}}'>
    <link rel='stylesheet' href='{{URL::asset('css/owlcarousel/owl.carousel.min.css')}}'>
    <link rel='stylesheet' href='{{URL::asset('css/owlcarousel/owl.theme.default.min.css')}}'>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Russo+One" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<body>
<div class='background'></div>
@yield('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="{{URL::asset('js/app.js')}}"></script>
<script src="{{URL::asset('js/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src='{{URL::asset("js/scripts.js")}}'></script>
</body>
</html>
