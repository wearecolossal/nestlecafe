@extends('layouts.master')

@section('banner', 'page simple')
@section('bannerText')
    {!! "Caf&eacute; Locator" !!}
@stop

@section('wrapper', 'full no-padding')

@section('content')
    <div class="clearfix"></div>
    <div class="mobile notice"><span>Please scroll down to view your results</span></div>
    <div class="locator-bar">
        <div class="search">
            <input id="address" type="text" value="" placeholder="Enter a location">
            <button class="find-address">Search Caf&eacute;s</button>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="map-container">
        <div id="map" class="map-embed"></div>
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
    <div class="container">
        <div class="output-list">
            <ul class="map-list" style="color:#fff">

            </ul>
            <div class="clearfix"></div>
                <div class="fallback-form" style="display:none;">
                    <h1>Not Finding Your Caf&eacute;?</h1>
                    <div class="form-filter">
                        <div class="form-group country">
                            <label for="">Which Country?</label><br>
                            {!! Form::open(['class' => 'search-country']) !!}
                                {!! Form::hidden('online-order', 0) !!}
                                <select name="country" id="country">
                                <option value="">Please Choose</option>
                                    @foreach(\App\Cafe::whereNotNull('country')->groupby('country')->orderby('country', 'asc')->get() as $country)
                                    <option value="{{ $country->country }}">{{ $country->country }}</option>
                                    @endforeach
                                </select>
                            {!! Form::close() !!}
                        </div>
                        <div class="form-group state hidden">
                            <label for="">Which State/Province?</label><br>
                            {!! Form::open(['class' => 'search-state']) !!}
                                {!! Form::hidden('online-order', 0) !!}
                                <select name="state" id="state">
                                <option value="">Please Choose</option>
                                    
                                </select>
                            {!! Form::close() !!}
                        </div>
                        <div class="form-group city hidden">
                            <label for="">Which City?</label><br>
                            {!! Form::open(['class' => 'search-city']) !!}
                                {!! Form::hidden('online-order', 0) !!}
                                <select name="city" id="city">
                                <option value="">Please Choose</option>
                                    
                                </select>
                            {!! Form::close() !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="store-filter-results">
                        <ul class="map-store-filter-results" style="color:#fff;"></ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
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
            $('select#city').on('change', function() {
                 var city = $(this).val();
                 var form = $(this).parent();
                 var data = form.serialize();
                 $('.map-store-filter-results').html('');
                 $.ajax({
                        method: 'POST',
                        url: "{{ URL::to('location-search-by-city') }}",
                        data: data,
                        success:function(response){
                            console.log(response);
                            var stores = response;
                            $('.map-store-filter-results').html();
                            var storeLength = stores.length;
                            $('.map-store-filter-results').html('');
                            //console.log(stores[0]['name'].length);
                            for(var i = 0; i <= storeLength - 1; i++) {

                                var onlineLength = stores[i]['online_order'].length;
                                var hideOnline = " ";
                                if (onlineLength < 1) {
                                    hideOnline = 'hide';
                                }
                                var mapLength = stores[i]['maps_url'].length;
                                var hideMap = " ";
                                if (mapLength < 1) {
                                    hideMap = 'hide';
                                }
                                var facebookLength = stores[i]['facebook_url'].length;
                                var hideFacebook = " ";
                                if (facebookLength < 1) {
                                    hideFacebook = 'hide';
                                }
                                var comingSoon = stores[i]['coming_soon'];
                                var soon_message = '';
                                if(comingSoon === 1) {
                                    soon_message = '<span style="background:#FAC216;color:#8B680E;padding:5px;font-size:10px;font-weight:bold;">COMING SOON</span><br/>';
                                }
                                $('.map-store-filter-results').append('' +
                    '<li class="cafe-list-item"><div class="list-container"><div class="image-container" style="background:url({{ URL::asset('uploads/store_images') }}/' + stores[i]['image'] + ')"></div><div class="cafe-info"><span class="name">' + stores[i]['name'] + '<a target="_blank" href="' + stores[i]['facebook_url'] + '" class="' + hideFacebook + '"><img src="' + imageLibrary + '/ico-facebook.png" width="15" style="margin-top:-3px;"/></a></span><br>' + '<small>' + stores[i]['address'] + '<br/>'+stores[i]['city']+', '+stores[i]['state']+' '+stores[i]['country']+'</small>' + (stores[i]['hours'] ? stores[i]['hours'] : null)+
                    '<br/><br>'+soon_message+'<a target="_blank" class="' + hideOnline + ' online-order" href="' + stores[i]['online_order'] + '">Order Online </a><a style="padding-left:5px;" target="_blank" class="' + hideMap + '" href="' + stores[i]['maps_url'] + '">Get Directions</a></div><div class="clearfix"></div><div class="services">' + '<img class="active-' + stores[i]['wifi'] + ' loc-wifi" src="' + imageLibrary + '/loc-wifi.png" width="30"/>' + '<img class="active-' + stores[i]['coffee'] + ' loc-coffee" src="' + imageLibrary + '/loc-coffee.png" width="30"/>' + '<img class="active-' + stores[i]['cookie'] + ' loc-cookie" src="' + imageLibrary + '/loc-cookie.png" width="30"/>' + '<img class="active-' + stores[i]['frozenyogurt'] + ' loc-frozenyogurt" src="' + imageLibrary + '/loc-frozenyogurt.png" width="30"/>' + '<img class="active-' + stores[i]['bakery'] + ' loc-bakery" src="' + imageLibrary + '/loc-bakery.png" width="30"/>' + '<img class="active-' + stores[i]['curbside'] + ' loc-curbside" src="' + imageLibrary + '/loc-curbside.png" width="30"/>' + '<img class="active-' + stores[i]['icecream'] + ' loc-icecream" src="' + imageLibrary + '/loc-icecream.png" width="30"/>' + '<img class="active-' + stores[i]['savory'] + ' loc-savory" src="' + imageLibrary + '/loc-savory.png" width="30"/>' + '<div class="clearfix"></div></div><div class="clearfix"></div></div><div class="clearfix"></div></li>');
                                
                            }
                            }
                    });   
            });
            $('select#state').on('change', function(){
                var state = $(this).val();
                var form = $(this).parent();
                var data = form.serialize();
                $('.form-group.city').removeClass('hidden');
                $('.map-store-filter-results').html('');
                $.ajax({
                        method: 'POST',
                        url: "{{ URL::to('location-search-state') }}",
                        data: data,
                        success:function(response){
                            //console.log(response);
                            var states = response;
                            $('select#city').html('<option value="">Please Choose</option>');
                            $.each(states, function(index, value) {
                                $('select#city').append('<option value="'+value+'">'+value+'</option>');
                            });
                        }
                    });
            });
            $('select#country').on('change', function() {
                var country = $(this).val();
                var form = $(this).parent();
                var data = form.serialize();

                if((country == 'United States of America') || (country == 'Canada')) {
                    $('.form-group.state').removeClass('hidden');
                    $('.form-group.city').addClass('hidden');
                    $('.map-store-filter-results').html('');
                    $.ajax({
                        method: 'POST',
                        url: "{{ URL::to('location-search') }}",
                        data: data,
                        success:function(response){
                            //console.log(response);
                            var states = response;
                            $('select#state').html('<option value="">Please Choose</option>');
                            $.each(states, function(index, value) {
                                $('select#state').append('<option value="'+value+'">'+value+'</option>');
                            });
                        }
                    });
                } else {
                    $('.form-group.state').addClass('hidden');
                    $('.form-group.city').addClass('hidden');
                    $.ajax({
                        method: 'POST',
                        url: "{{ URL::to('location-search-by-country') }}",
                        data: data,
                        success:function(response){
                            var stores = response;
                            console.log(response);
                            $('.map-store-filter-results').html();
                            var storeLength = stores.length;
                            $('.map-store-filter-results').html('');
                            //console.log(stores[0]['name'].length);
                            for(var i = 0; i <= storeLength - 1; i++) {

                                var onlineLength = stores[i]['online_order'].length;
                                var hideOnline = " ";
                                if (onlineLength < 1) {
                                    hideOnline = 'hide';
                                }
                                var mapLength = stores[i]['maps_url'].length;
                                var hideMap = " ";
                                if (mapLength < 1) {
                                    hideMap = 'hide';
                                }
                                var facebookLength = stores[i]['facebook_url'].length;
                                var hideFacebook = " ";
                                if (facebookLength < 1) {
                                    hideFacebook = 'hide';
                                }
                                var comingSoon = stores[i]['coming_soon'];
                                var soon_message = '';
                                if(comingSoon === 1) {
                                    soon_message = '<span style="background:#FAC216;color:#8B680E;padding:5px;font-size:10px;font-weight:bold;">COMING SOON</span><br/>';
                                }
                                $('.map-store-filter-results').append('' +
                    '<li class="cafe-list-item"><div class="list-container"><div class="image-container" style="background:url({{ URL::asset('uploads/store_images') }}/' + stores[i]['image'] + ')"></div><div class="cafe-info"><span class="name">' + stores[i]['name'] + '<a target="_blank" href="' + stores[i]['facebook_url'] + '" class="' + hideFacebook + '"><img src="' + imageLibrary + '/ico-facebook.png" width="15" style="margin-top:-3px;"/></a></span><br>' + '<small>' + stores[i]['address'] + '</small>'  + (stores[i]['hours'] ? stores[i]['hours'] : null)+
                    '<br/><br>'+soon_message+'<a target="_blank" class="' + hideOnline + ' online-order" href="' + stores[i]['online_order'] + '">Order Online </a><a style="padding-left:5px;" target="_blank" class="' + hideMap + '" href="' + stores[i]['maps_url'] + '">Get Directions</a></div><div class="clearfix"></div><div class="services">' + '<img class="active-' + stores[i]['wifi'] + ' loc-wifi" src="' + imageLibrary + '/loc-wifi.png" width="30"/>' + '<img class="active-' + stores[i]['coffee'] + ' loc-coffee" src="' + imageLibrary + '/loc-coffee.png" width="30"/>' + '<img class="active-' + stores[i]['cookie'] + ' loc-cookie" src="' + imageLibrary + '/loc-cookie.png" width="30"/>' + '<img class="active-' + stores[i]['frozenyogurt'] + ' loc-frozenyogurt" src="' + imageLibrary + '/loc-frozenyogurt.png" width="30"/>' + '<img class="active-' + stores[i]['bakery'] + ' loc-bakery" src="' + imageLibrary + '/loc-bakery.png" width="30"/>' + '<img class="active-' + stores[i]['curbside'] + ' loc-curbside" src="' + imageLibrary + '/loc-curbside.png" width="30"/>' + '<img class="active-' + stores[i]['icecream'] + ' loc-icecream" src="' + imageLibrary + '/loc-icecream.png" width="30"/>' + '<img class="active-' + stores[i]['savory'] + ' loc-savory" src="' + imageLibrary + '/loc-savory.png" width="30"/>' + '<div class="clearfix"></div></div><div class="clearfix"></div></div><div class="clearfix"></div></li>');
                                
                            }
                            }
                    });
                }
            });
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