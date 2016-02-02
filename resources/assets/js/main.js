var menuToggles = function (width) {
    if (width > 842) {
        $('ul.navlist a.dropdown').mouseenter(function () {
            var target = $(this).data('dropdown');
            $(target).addClass('active');
            $('.navigation').addClass('extended');
        });

        $('ul.navlist a.dropdown').mouseleave(function () {
            var target = $(this).data('dropdown');
            if (!$(target).hasClass('active')) {
                $(target).removeClass('active');
                $('.navigation').removeClass('extended');
            }
        });

        $('ul.navlist a').mouseleave(function () {
            if (!$(this).hasClass('dropdown')) {
                $('ul.menulist').removeClass('active');
                $('.navigation').removeClass('extended');
            }
        });

        $('.menulist.dropdown').mouseleave(function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $('.navigation').removeClass('extended');
            }
        });

        $('a.logo').mouseenter(function () {
            $('ul.menulist').removeClass('active');
            $('.navigation').removeClass('extended');
        });
    }
};

$(document).ready(function () {
    var width = $(window).width();
    menuToggles(width);

    $(window).resize(function () {
        width = $(this).width();
        menuToggles(width);
    });


    $('a.mobile-show').click(function () {
        $('ul.navlist').toggleClass('display');
        $('.menulist').removeClass('active');
        $('.navigation').toggleClass('mobile-extended');
    });

    $('li.mobile-current a').click(function () {
        $('.columns.side').toggleClass('mobile-extended');
    });

});

/*========================
 * GOOGLE
 * MAP SCRIPT
 ========================== */
function mapScript(filterLocation, outputLocation, markerIcon, imageLibrary) {
    $('button.find-address').on('click', function () {
        codeAddress();
    });

    //get markers
    var list;
    var map = $("#map");
    var start = 0;
    var showMap = function (latitude, longitude) {
        var coords = new google.maps.LatLng(latitude, longitude);

        var options = {
            zoom: 15,
            center: coords,
            mapTypeControl: false,
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.SMALL
            },
            styles:[
                {
                    "featureType": "water",
                    "stylers": [
                        {
                            "saturation": 43
                        },
                        {
                            "lightness": -11
                        },
                        {
                            "hue": "#0088ff"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "hue": "#ff0000"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 99
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#808080"
                        },
                        {
                            "lightness": 54
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ece2d9"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ccdca1"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#767676"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#EBE5E0"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi.sports_complex",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ],
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"), options);

        var marker = new google.maps.Marker({
            position: coords,
            map: map,
            title: "You are here!"
        });
    };

    var setInitialMap = function (geoLat, geoLng, zoom) {
        var latlng = new google.maps.LatLng(geoLat, geoLng);
        var mapOptions = {
            zoom: zoom,
            center: latlng,
            styles:[
                {
                    "featureType": "water",
                    "stylers": [
                        {
                            "saturation": 43
                        },
                        {
                            "lightness": -11
                        },
                        {
                            "hue": "#0088ff"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "hue": "#ff0000"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 99
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#808080"
                        },
                        {
                            "lightness": 54
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ece2d9"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ccdca1"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#767676"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#EBE5E0"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi.sports_complex",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ]
        };
        $('#map').addClass('active');
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var myLatLng = {lat: geoLat, lng: geoLng};
        //var marker = new google.maps.Marker({
        //    position: myLatLng,
        //    map: map,
        //    title: 'You are here!'
        //});
    };

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(initialize, geoError);
            outputStores();
            $('.mobile.notice').addClass('active');
        } else {
            map.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    var geoError = function (error) {
        console.log('Error occurred. Error code: ' + error.code);
        if (error.code <= 3) {
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
        //console.log(geoLat+' , '+geoLng);
        filterStores(geoLat, geoLng);
        setInitialMap(geoLat, geoLng, 9);
    }

    function fallback() {
        geocoder = new google.maps.Geocoder();
        var geoLat = '31.968599';
        var geoLng = '-99.901813';
        setInitialMap(geoLat, geoLng, 5);
    }

    function codeAddress() {
        var address = document.getElementById("address").value;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setZoom(9);
                map.setCenter(results[0].geometry.location);
                //var marker = new google.maps.Marker({
                //    map: map,
                //    position: results[0].geometry.location
                //});
                filterStores(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                outputStores();
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    setTimeout(function () {
        getLocation();
    }, 1000);

    var filterStores = function (lat, lng) {
        $('.map-list').html('');
        $('.map-list').hide();
        $.getJSON(filterLocation + lat + "/" + lng, function (json1) {
            $.each(json1, function (key, data) {

                var onlineLength = data[0].online_order.length;
                var hideOnline = " ";
                if(onlineLength < 1) {
                    hideOnline = 'hide';
                }
                var mapLength = data[0].map.length;
                var hideMap = " ";
                if(mapLength < 1) {
                    hideMap = 'hide';
                }
                var facebookLength = data[0].facebook.length;
                console.log(facebookLength);
                var hideFacebook = " ";
                if(facebookLength < 1) {
                    hideFacebook = 'hide';
                }

                $('.map-list').append('' +
                    '<li data-miles="' + data[0].miles + '" class="cafe-list-item"><div class="list-container"><div class="image-container" style="background:url(' + data[0].image + ')"></div><div class="cafe-info"><span class="name">' + data[0].name + '</span><br>' + '<small>' + data[0].address + '</small>' +
                    '<br/><small>' + Math.round(data[0].miles) +
                    ' miles</small><br><a target="_blank" class="'+hideOnline+' online-order" href="'+data[0].online_order+'">Online Order</a> <a target="_blank" class="'+hideMap+'" href="'+data[0].map+'">Get Directions</a></div><div class="clearfix"></div><div class="services">'+'<img class="active-'+data[0].wifi+' loc-wifi" src="'+imageLibrary+'/loc-wifi.png" width="30"/>'+'<img class="active-'+data[0].coffee+' loc-coffee" src="'+imageLibrary+'/loc-coffee.png" width="30"/>'+'<img class="active-'+data[0].cookie+' loc-cookie" src="'+imageLibrary+'/loc-cookie.png" width="30"/>'+'<img class="active-'+data[0].frozenyogurt+' loc-frozenyogurt" src="'+imageLibrary+'/loc-frozenyogurt.png" width="30"/>'+'<img class="active-'+data[0].bakery+' loc-bakery" src="'+imageLibrary+'/loc-bakery.png" width="30"/>'+'<img class="active-'+data[0].curbside+' loc-curbside" src="'+imageLibrary+'/loc-curbside.png" width="30"/>'+'<img class="active-'+data[0].icecream+' loc-icecream" src="'+imageLibrary+'/loc-icecream.png" width="30"/>'+'<img class="active-'+data[0].savory+' loc-savory" src="'+imageLibrary+'/loc-savory.png" width="30"/>'+'<a target="_blank" href="'+data[0].facebook+'" class="facebook '+hideFacebook+'"><img src="'+imageLibrary+'/ico-facebook.png" width="25"/></a><div class="clearfix"></div></div><div class="clearfix"></div></div><div class="clearfix"></div></li>');
                //country: "USA"
                //id: 33
                //lat: "40.093139"
                //lng: "-74.957553"
                //miles: 68.8661391445
                //name: "Franklin Mills II"
                //state: "Pennsylvania"
                //list += '<li>'+data[0].name+'</li>';
            });
            if (json1.length < 1) {
                $('.map-list').html('<li class="no-result">Sorry, there are no nearby caf&eacute;s!</li>');
            }
        });
        setTimeout(function () {
            sortByMiles();
        }, 1000);
        setTimeout(function () {
            $('.map-list').fadeIn();
        }, 1500);
    };

    var outputStores = function () {
        setTimeout(function () {
            $.getJSON(outputLocation, function (json1) {
                $.each(json1, function (key, data) {
                    var latLng = new google.maps.LatLng(data.lat, data.lng);
                    // Creating a marker and putting it on the map
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map,
                        animation: google.maps.Animation.DROP,
                        title: data.title,
                        direction: data.directions,
                        icon: markerIcon,
                        thumbnail: data.thumbnail
                    });
                    var hide_map = '';
                    var hide_image = '';
                    if (marker.direction.length < 1) {
                        hide_map = 'display:none';
                    }
                    if (marker.thumbnail.length < 1) {
                        hide_image = 'display:none';
                    }
                    var contentString = null;
                    var infowindow = null;
                    infowindow = new google.maps.InfoWindow();

                    marker.addListener('click', function () {
                        infowindow.setContent('<p><img src="' + data.thumbnail + '" width="128" style="' + hide_image + '"/><br/><strong>' + this.title + '</strong><br/> <a class="map-button" style="' + hide_map + '" target="_blank" href="' + this.direction + '">directions</a>');
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

    function sortByMiles() {
        $(".map-list li").sort(sort_li) // sort elements
            .appendTo('.map-list'); // append again to the list
        // sort function callback
        function sort_li(a, b) {
            return ($(b).data('miles')) < ($(a).data('miles')) ? 1 : -1;
        };
    };

    $('.filter-choices a').on('click', function () {
        var that = $(this);
        $('.map-list li.no-results').remove();
        var filter = $(this).data('filter');
        if(that.hasClass('chosen')) {
            $('.filter-choices a').removeClass('chosen');
            $('.map-list li').fadeIn();
        } else {
            $('.filter-choices a').removeClass('chosen');
            $(this).addClass('chosen');
            $('.map-list li').fadeOut();
            $('img.active-1.'+filter).parent().parent().parent().fadeIn();
            if($('img.active-1.'+filter).length < 1) {
                $('.map-list').append('<li class="no-result">Sorry, there are results for your filter!</li>');
            }
        }
    });
}