@extends('layouts.master')

@section('banner', 'page simple')
@section('bannerText')
    {!! "Caf&eacute; Locator" !!}
@stop

@section('content')
    <div class="clearfix"></div>
    <div class="locator-bar">
        <div class="search">
            <input id="address" type="text" value="" placeholder="Enter Address">
            <button class="find-address">Search Caf&eacute;s</button>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="output-list">
        <ul class="map-list" style="color:#fff">

        </ul>
    </div>
    <div id="map" class="map-embed"></div>
    <div class="clearfix"></div>
@stop

@section('scripts')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-JYeFLI2aIfjv8bS9dJMY_1HGaKEdiXU&sensor=false"></script>
    {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>--}}
    <script>
            var filterLocation = "{{ URL::to('filter-locations') }}/";
            var outputLocation = "{{ URL::to('output-locations') }}";
            var markerIcon = '{{ URL::asset('library/img/nestle-marker.png') }}';
            mapScript(filterLocation, outputLocation, markerIcon);
    </script>
@stop