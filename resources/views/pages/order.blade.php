@extends('layouts.master')

@section('banner', 'page simple')
@section('bannerText')
    {!! "Online Order" !!}
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
    <div class="clearfix"></div>
    <div class="output-list online-order">
        <ul class="map-list" style="color:#fff">

        </ul>
    </div>
    <div style="display:none">
        <div class="map-container">
            <div id="map" class="map-embed"></div>
        </div>
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
        var filterLocation = "{{ URL::to('filter-order-locations') }}/";
        var outputLocation = "{{ URL::to('output-locations') }}";
        var markerIcon = '{{ URL::asset('library/img/nestle-marker.png') }}';
        var imageLibrary = '{{ URL::asset('library/img') }}';
        mapScript(filterLocation, outputLocation, markerIcon, imageLibrary);
    </script>
@stop