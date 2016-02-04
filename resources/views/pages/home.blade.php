@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('library/css/jquery.bxslider.css') }}">
@stop

@section('hex', '#F1F295')
@section('banner', 'home')

@section('content')

    <div class="section red">
        <h1>Our Seasonal Picks <br><small>You'll love these unique treats' distinct seasonal flavor.</small></h1>
        <div class="container">
            <div class="masonry">
                <div class="masonry-list-item one-third"><a href="{{ URL::to('menu/real-fruit-smoothies') }}"><img src="{{ URL::asset('library/img/menu-real-fruit-smoothies.jpg') }}" alt=""><span>Real
                    Fruit <br> Smoothies</span></a></div>
                <div class="masonry-list-item two-third on-white"><img src="{{ URL::asset('library/img/masonry-treat.jpg') }}" alt=""><span>Treats for the <br> holiday season</span></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="section image parallax" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/section-franchise.jpg') }}">
        <div class="container">
            <div class="content">
                <h1>Franchising Opportunity</h1>
                <p>Explore the Nestl&eacute; Toll House Caf&eacute; franchise and engage in our highly compelling business opportunity.</p>
                <a href="{{ URL::to('franchise') }}" class="btn wired">Life is full of treats</a>
                <div class="clearfix"></div>
                <small class="fine-print">- Existing franchisees find your location -</small>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="section yellow">
        <h1 class="standard">
            Connect with Us and Share Your Nestl&eacute; Cafe Experience!
        </h1>
        <div class="clearfix"></div>
            <div class="container full">
                <div id="instafeed">

                </div>
            </div>
        <div class="clearfix"></div>
    </div>

    <div class="section image parallax left-align center-focus non-flex-on-mobile" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/section-app.jpg') }}" style="overflow:hidden;height:400px;">
        <div class="container full-on-mobile">
            <div class="content on-white">
                <h1>Download Our App</h1>
                <p>Earn rewards, locate the nearest caf&eacute;, order your favorite treats with online ordering and so much more!</p>
                <div class="clearfix"></div>
                <div class="app-downloads">
                    <a href="https://itunes.apple.com/us/app/nestle-toll-house-cafe-by-chip/id1035761259?mt=8" target="_blank" class="apple"><img src="{{ URL::asset('library/img/app-apple.png') }}" alt=""></a>
                    <a href="https://play.google.com/store/apps/details?id=com.nestle.passconnect&hl=en" target="_blank" class="google"><img src="{{ URL::asset('library/img/app-google.png') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ URL::asset('library/js/jquery.bxslider.js') }}"></script>
    <script src="{{ URL::asset('library/js/instafeed.js') }}"></script>
    <script>
        $(document).ready(function(){
           $('ul.slider').bxSlider({
               mode: 'fade',
               pager: false
           });
        });
    </script>
    <script type="text/javascript">
        var feed = new Instafeed({
            get: 'user',
            userId: '201190894',
            accessToken: '201190894.704434c.064cb422809e4e5a8a2a37312c465cc0',
            limit: 4,
            resolution: 'standard_resolution'
        });
        feed.run();
    </script>
    <script>
        $(document).ready(function(){
            setTimeout(function(){
                $('#instafeed a').attr('target', '_blank');
            }, 1000);
        });
    </script>
@stop