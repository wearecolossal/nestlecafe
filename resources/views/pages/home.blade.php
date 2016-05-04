@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('library/css/jquery.bxslider.css') }}">
@stop

@section('hex', '#F1F295')
@section('banner', 'home')

@section('content')

    <div class="section red">
        <h1>{{ $callout->callout_heading }} <br><small>{{ $callout->callout_subheading }}</small></h1>
        <div class="container">
            <div class="masonry">
                <div class="masonry-list-item one-third {{ $callout->callout_1_on_white == 1 ? 'on-white' : null }}"><a href="{{ $callout->callout_1_link }}"><img src="{{ URL::asset('uploads/homepage_callouts/'.$callout->callout_1) }}" alt=""><span>{!! $callout->callout_1_text !!}</span></a></div>
                <div class="masonry-list-item two-third {{ $callout->callout_2_on_white == 1 ? 'on-white' : null }}"><a href="{{ $callout->callout_2_link }}"><img src="{{ URL::asset('uploads/homepage_callouts/'.$callout->callout_2) }}" alt=""><span>{!! $callout->callout_2_text !!}</span></a></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="section image parallax" data-parallax="scroll" data-image-src="{{ URL::asset('library/img/section-franchise.jpg') }}">
        <div class="container">
            <div class="content">
                <h1>Franchising Opportunity</h1>
                <p>Explore the Nestl&eacute;&reg; Toll House&reg; Caf&eacute; By Chip&reg; franchise and engage in our highly compelling business opportunity.</p>
                <a href="{{ URL::to('franchise') }}" class="btn wired">Life is full of treats</a>
                <div class="clearfix"></div>
                <small class="fine-print"><a href="{{ URL::to('locations') }}">- Existing franchisees find your location -</a></small>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="section yellow">
        <h1 class="standard">
            Connect with Us and Share Your Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup> Caf&eacute; By Chip<sup>&reg;</sup> Experience!
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



@stop

@section('scripts')
    <script src="{{ URL::asset('library/js/jquery.bxslider.js') }}"></script>
    <script src="{{ URL::asset('library/js/instafeed.js') }}"></script>
    <script>
        $(document).ready(function(){
           $('ul.slider').bxSlider({
               mode: 'fade',
               pager: false,
               auto: true,
               pause: 10000,
               speed: 500
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