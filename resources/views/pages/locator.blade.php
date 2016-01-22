@extends('layouts.master')

@section('banner', 'page simple')
@section('bannerText')
    {!! "Caf&eacute; Locator" !!}
@stop

@section('content')
    <br><br>
    <div class="clearfix"></div>
    <button onclick="codeAddress()">Code Address</button>
    <input id="address" type="textbox" value="" placeholder="Search for cafes">
    <br><br>
    <div id="map" class="map-embed"></div>
@stop

@section('scripts')
    {{--<script type="text/javascript"--}}
            {{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-JYeFLI2aIfjv8bS9dJMY_1HGaKEdiXU&sensor=false"></script>--}}
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script>
            var map = $("#map");
            var start = 0;
            var showMap = function(latitude, longitude) {
                var coords = new google.maps.LatLng(latitude, longitude);

                var options = {
                    zoom: 15,
                    center: coords,
                    mapTypeControl: false,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.SMALL
                    },
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("map"), options);

                var marker = new google.maps.Marker({
                    position: coords,
                    map: map,
                    title:"You are here!"
                });
            };

            var setInitialMap = function(geoLat, geoLng, zoom) {
                var latlng = new google.maps.LatLng(geoLat, geoLng);
                var mapOptions = {
                    zoom: zoom,
                    center: latlng
                };
                $('#map').addClass('active');
                map = new google.maps.Map(document.getElementById("map"), mapOptions);
                var myLatLng = {lat: geoLat, lng: geoLng};
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'You are here!'
                });
            };

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(initialize, geoError);
                } else {
                    map.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            var geoError = function(error) {
                console.log('Error occurred. Error code: ' + error.code);
                if(error.code <= 3) {
                    fallback();
                }
                // error.code can be:
                //   0: unknown error
                //   1: permission denied
                //   2: position unavailable (error response from location provider)
                //   3: timed out
            };


            var geocoder;
            var map;
            function initialize(position) {
                geocoder = new google.maps.Geocoder();
                var geoLat = position.coords.latitude;
                var geoLng = position.coords.longitude;
                setInitialMap(geoLat, geoLng, 15);
            }

            function fallback() {
                geocoder = new google.maps.Geocoder();
                var geoLat = '31.968599';
                var geoLng = '-99.901813';
                setInitialMap(geoLat, geoLng, 5);
            }

            function codeAddress() {
                var address = document.getElementById("address").value;
                geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setZoom(15);
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            }

            setTimeout(function(){
                getLocation();
            }, 1000);


    </script>
@stop
