@extends('layouts.master')

@section('banner', 'page simple')
@section('bannerText')
    {!! "Caf&eacute; Locator" !!}
@stop

@section('content')
    <div class="clearfix"></div>
    <div class="mobile notice"><span>Please scroll down to view your results</span></div>
    <div class="locator-bar">
        <div class="search">
            <input id="address" type="text" value="" placeholder="Enter Address">
            <button class="find-address">Search Caf&eacute;s</button>
        </div>
    </div>
    <div class="map-filter-bar">
        <h4>Filters</h4>

        <div class="filter-choices">
            <a data-tooltip="yes" data-tooltip-title="Bakery" data-filter="loc-bakery"><img src="{{ URL::asset('library/img/loc-bakery.png') }}" alt=""></a>
            <a data-tooltip="yes" data-tooltip-title="Ice Cream" data-filter="loc-icecream"><img src="{{ URL::asset('library/img/loc-icecream.png') }}" alt=""></a>
            <a data-tooltip="yes" data-tooltip-title="Coffee" data-filter="loc-coffee"><img src="{{ URL::asset('library/img/loc-coffee.png') }}" alt=""></a>
            <a data-tooltip="yes" data-tooltip-title="Frozen Yogurt" data-filter="loc-frozenyogurt"><img src="{{ URL::asset('library/img/loc-frozenyogurt.png') }}" alt=""></a>
            <a data-tooltip="yes" data-tooltip-title="Smoothies" data-filter="loc-smoothies"><img src="{{ URL::asset('library/img/loc-smoothies.png') }}" alt=""></a>
            <a data-tooltip="yes" data-tooltip-title="Wifi" data-filter="loc-wifi"><img src="{{ URL::asset('library/img/loc-wifi.png') }}" alt=""></a>
            <a data-tooltip="yes" data-tooltip-title="Curbside" data-filter="loc-curbside"><img src="{{ URL::asset('library/img/loc-curbside.png') }}" alt=""></a>
            <a data-tooltip="yes" data-tooltip-title="Cookies" data-filter="loc-cookie"><img src="{{ URL::asset('library/img/loc-cookie.png') }}" alt=""></a>
            <a data-tooltip="yes" data-tooltip-title="Savory" data-filter="loc-savory"><img src="{{ URL::asset('library/img/loc-savory.png') }}" alt=""></a>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="output-list">
        <ul class="map-list" style="color:#fff">

        </ul>
    </div>
    <div class="map-container">
        <div id="map" class="map-embed"></div>
    </div>
    <div class="clearfix"></div>
@stop

@section('scripts')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-JYeFLI2aIfjv8bS9dJMY_1HGaKEdiXU&sensor=false"></script>
    {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>--}}
    <script>
        $(document).ready(function () {
            $('input#address').on('focus', function(){
                $(document).keypress(function(e) {
                    if(e.which == 13) {
                        $('button.find-address').click();
                    }
                });
            });
        });
    </script>
    <script>
        var filterLocation = "{{ URL::to('filter-locations') }}/";
        var outputLocation = "{{ URL::to('output-locations') }}";
        var markerIcon = '{{ URL::asset('library/img/nestle-marker.png') }}';
        var imageLibrary = '{{ URL::asset('library/img') }}';
        mapScript(filterLocation, outputLocation, markerIcon, imageLibrary);
    </script>
@stop