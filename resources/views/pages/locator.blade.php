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
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-JYeFLI2aIfjv8bS9dJMY_1HGaKEdiXU&sensor=false"></script>
    {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>--}}
    <script>

            //get markers

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
                    outputStores();
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
                console.log(geoLat+' , '+geoLng);
                setInitialMap(geoLat, geoLng, 11);
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

                        outputStores();
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            }

            setTimeout(function(){
                getLocation();
            }, 1000);

            var outputStores = function() {
                setTimeout(function(){
                    $.getJSON("{{ URL::to('output-locations') }}", function(json1) {
                        $.each(json1, function(key, data) {
                            var latLng = new google.maps.LatLng(data.lat, data.lng);
                            // Creating a marker and putting it on the map
                            var marker = new google.maps.Marker({
                                position: latLng,
                                map: map,
                                animation: google.maps.Animation.DROP,
                                title: data.title,
                                direction: data.directions,
                                icon: '{{ URL::asset('library/img/nestle-marker.png') }}',
                                thumbnail: data.thumbnail
                            });
                            var hide_map = '';
                            var hide_image = '';
                            if(marker.direction.length < 1) {
                                hide_map = 'display:none';
                            }
                            if(marker.thumbnail.length < 1) {
                                hide_image = 'display:none';
                            }
                            var contentString = null;
                            var infowindow = null;
                            infowindow = new google.maps.InfoWindow();

                            marker.addListener('click', function(){
                                infowindow.setContent('<p><img src="'+data.thumbnail+'" width="128" style="'+hide_image+'"/><br/><strong>' + this.title+ '</strong><br/> <a class="map-button" style="'+ hide_map +'" target="_blank" href="'+ this.direction +'">directions</a>');
                                infowindow.open(map, this);
                            });

                            function toggleBounce() {
                                if (marker.getAnimation() !== null) {
                                    marker.setAnimation(null);
                                } else {
                                    marker.setAnimation(google.maps.Animation.BOUNCE);
                                }
                            }
                        });
                    });
                }, 3000);
            };


    </script>
@stop