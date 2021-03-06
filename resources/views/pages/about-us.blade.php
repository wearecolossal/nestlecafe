@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "About Us" !!}
@stop

@section('wrapper', 'full')

@section('content')
    <section class="page">
        <div class="container compressed">
            <div class="block header">
                <h2>A Dessert Cafe That Began With A Dream, <br> One World-Renowned Brand And A Passion For Service</h2>
            </div>
            <div class="block transparent">
                <p>
                    All great stories have a sensational beginning. A once upon a time. For us, it was a rich history of Nestl&eacute; brands woven into our lifestyle and a dream to make the world a beautiful place to spread the love and enhance the way we live. From the beginning, Nestl&eacute;&reg; Toll House&reg; Caf&eacute; by Chip&reg; was destined to be more than just a bakery; it's our passion for those sweet memorable moments in life.
                    <br><br>
                    So, our founders embarked on a journey to share passion with the world.<br><br>
                    Starting with a single caf&eacute;, we began introducing our unique service to US consumers in August 2000. And what followed was an explosion of interest and the creation of Nestl&eacute; dessert cafes across the US and, most recently, global expansion.<br><br>
                    At the heart of our business, is a vision to enrich the lives of others and serve up the ultimate dessert experience through unrivaled service, superior performance and a positive impact on our community.<br><br>
                    We think dessert should be exciting whether making someone's day with a gift or simply escaping for a moment of quiet-me-time. Each loved recipe is hand finished with artisan flair for a legendary temptation.<br><br>
                    Step into one of our many cafes and step into an adventure for all of the senses. Discover the authentic taste of gourmet desserts, made with the finest Nestle ingredients. Indulge in the soothing aromas of chocolate and the subtle tones of ice cream infused with dessert coffees. It's a place to relax, bring back a flood of childhood memories, and dare to explore the exciting confections the cafes have to offer.<br><br>
                </p>
            </div>
        </div>
    </section>

    <div class="section image" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/section-about.jpg') }}" style="background-position-y: center !important;height:300px;margin-bottom:-50px;">
        <div class="container">
            <div class="content">
                <h1 style="margin-top:0;padding-top:0;margin-bottom:10px;">Life happens at an <br> exhilarating speed...</h1>
                <p style="font-size:1em;width:80%;margin:0 auto;">
                    Stop and share the moment at Nestl&eacute;&reg; Toll House&reg; Caf&eacute; by Chip&reg;
                </p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@stop

@section('scripts')
@stop