<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ metaTitle(isset($metaTitle) ? $metaTitle : null) }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="http://nestlecafe.com/" />
    <link rel="apple-touch-icon" href="{{ URL::asset('library/img/avatar.png') }}"/>
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('library/img/favicon.ico') }}" />
    <link href="https://plus.google.com/105619345822932493250" rel="publisher" />

    {{--FACEBOOK--}}
    <meta property="og:title" content=“{{ metaTitle() }}"/>
    <meta property="og:image" content="{{ URL::asset('library/img/avatar.png') }}"/>
    <meta property="og:site_name" content="Nestl&eacute;&reg; Tollhouse&reg; Caf&eacute; By Chip&reg;"/>
    <meta property="og:description" content="Nestl&eacute;&reg; Tollhouse&reg; Caf&eacute; By Chip&reg; is premiere dessert café and a leader in dessert destinations offering customers an unrivaled dessert experience through the use of fine ingredients, indulgent creations, distinct flavor profiles, and the rich tradition of the very best Nestl&eacute;&reg; brands."/>
    {{--<link rel="apple-touch-icon" href="{{ URL::asset('library/img/apple-touch-icon.png') }}">--}}
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{ URL::asset('library/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('library/css/app.css') }}">
    @yield('styles')
    <script src="{{ URL::asset('library/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->