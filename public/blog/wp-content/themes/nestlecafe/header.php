<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nestlecafe
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nestlecaf&eacute; Cookie Talk</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="apple-touch-icon" href="<?php echo str_replace('blog', 'library/img/apple-touch-icon.png', site_url()); ?>">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="<?php echo str_replace('blog', 'library/css/normalize.css', site_url()); ?>">
    <link rel="stylesheet" href="<?php echo str_replace('blog', 'library/css/app.css', site_url()); ?>">
    <script src="<?php echo str_replace('blog', 'library/js/vendor/modernizr-2.8.3.min.js', site_url()); ?>"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<body <?php body_class(); ?>>

<nav class="navigation">
    <div class="container">
        <a href="<?php echo str_replace('blog', '', site_url()); ?>" class="logo"><img src="<?php echo str_replace('blog', 'library/img/logo.png', site_url()); ?>" alt=""></a>
        <ul class="navlist">
            <li><a class="dropdown" data-dropdown="#menu" href="{{ URL::to('menu') }}">Menu</a></li>
            <li><a class="" href="<?php echo str_replace('blog', 'locations', site_url()); ?>">Caf&eacute; Locator</a></li>
            <li><a class="" href="<?php echo str_replace('blog', 'story', site_url()); ?>">Our Story</a></li>
            <li><a class="" href="<?php echo str_replace('blog', 'franchise', site_url()); ?>">Franchise</a></li>
        </ul>
        <a href="<?php echo str_replace('blog', 'online-order', site_url()); ?>" class="order-online"><span>Online Order</span></a>
        <a class="mobile-show"><img src="<?php echo str_replace('blog', 'library/img/ico-menu.png', site_url()); ?>" height="30" alt=""></a>
    </div>
    <?php
    /*
    ?>
    <ul class="menulist dropdown" id="menu">
        @foreach(\App\MenuCategory::orderby('order', 'asc')->get() as $menuNav)
        <li><a href="{{ URL::to('menu/'.$menuNav->url) }}">{{ $menuNav->name }}</a></li>
        @endforeach
    </ul>
    */
    ?>
</nav>


<div class="banner page" style="background:url(<?php echo str_replace('blog', 'library/img/banner-page.jpg', site_url()); ?>)">

    <div class="banner-wrapper">
        <div class="container">
            <p>Cookie Talk</p>
        </div>
    </div>
</div>

<div class="clearfix"></div>