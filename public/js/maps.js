
//Map ------------------------------------------------------------------------------------------------------------------

function CreateMap(_latitude, _longitude, element, markerDrag, place) {

    if (!markerDrag) {
        markerDrag = false;
    }
    var mapCenter, geocoder, geoOptions;

    if (place) {
        geocoder = new google.maps.Geocoder();
        geoOptions = {
            address: place
        };
        geocoder.geocode(geoOptions, getCenterFromAddress());
        function getCenterFromAddress() {
            return function (results, status) {
                console.log('map results ----------------',results)
                if (status == google.maps.GeocoderStatus.OK) {
                    mapCenter = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                    drawMap(mapCenter);
                } else {
                    console.log("Geocode failed");
                    console.log(status);
                }
            };
        }
    }
    else {
        mapCenter = new google.maps.LatLng(_latitude, _longitude);
        drawMap(mapCenter);
    }

    function drawMap(mapCenter) {
        var mapOptions = {
            zoom: 13,
            center: mapCenter,
            disableDefaultUI: true,
            scrollwheel: true,
            clickableIcons: false,
            styles: [{ "featureType": "all", "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] }, { "featureType": "all", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "all", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "lightness": 20 }, { "color": "#ececec" }] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "visibility": "on" }, { "color": "#f0f0ef" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#f0f0ef" }] }, { "featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [{ "visibility": "on" }, { "color": "#d4d4d4" }] }, { "featureType": "landscape.natural", "elementType": "all", "stylers": [{ "visibility": "on" }, { "color": "#ececec" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "lightness": 21 }, { "visibility": "off" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#d4d4d4" }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#303030" }] }, { "featureType": "poi", "elementType": "labels.icon", "stylers": [{ "saturation": "-100" }] }, { "featureType": "poi.attraction", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.business", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.government", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.medical", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.park", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#dedede" }, { "lightness": 21 }] }, { "featureType": "poi.place_of_worship", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.school", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.school", "elementType": "geometry.stroke", "stylers": [{ "lightness": "-61" }, { "gamma": "0.00" }, { "visibility": "off" }] }, { "featureType": "poi.sports_complex", "elementType": "all", "stylers": [{ "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#dadada" }, { "lightness": 17 }] }]
        };
        var mapElement = document.getElementById(element);
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new RichMarker({
            position: mapCenter,
            map: map,
            draggable: markerDrag,
            content: "<img src='/images/maps/ico.ico'>",
            flat: true
        });

        geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'latLng': mapCenter }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    CollectData(results[0]);
                }
            }
        });

        google.maps.event.addListener(marker, "dragend", function () {
            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                latLng: this.position
            }, function (responses) {
                if (responses && responses.length > 0) {
                    CollectData(responses[0]);
                }
            });
        });

        google.maps.event.addListener(map, 'click', function (event) {
            marker.setPosition(event.latLng);

            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                latLng: event.latLng
            }, function (responses) {
                if (responses && responses.length > 0) {
                    CollectData(responses[0]);
                }
            });
        });


        //Load Autocomplete ---------------------------------------------------------------------------------------------------------
        var options_address_autocomplete_country = {
            componentRestrictions: { country: "us" }
        };
        var options_city_autocomplete = {
            types: ['(cities)'],
        };
        var options_city_autocomplete_country = {
            types: ['(cities)'],
            componentRestrictions: { country: "us" }
        };
        var options_region_autocomplete = {
            types: ['(regions)'],
        };
        var options_region_autocomplete_country = {
            types: ['(regions)'],
            componentRestrictions: { country: "us" }
        };

        AutoComplete(map, marker, 'address');
        AutoComplete(map, marker, 'address-autocomplete-country', options_address_autocomplete_country);
        AutoComplete(map, marker, 'city-autocomplete', options_city_autocomplete);
        AutoComplete(map, marker, 'city-autocomplete-country', options_city_autocomplete_country);
        AutoComplete(map, marker, 'region-autocomplete', options_region_autocomplete);
        AutoComplete(map, marker, 'region-autocomplete-country', options_region_autocomplete_country);
    }
}

//Autocomplete ---------------------------------------------------------------------------------------------------------

function AutoComplete(map, marker, searchbox, options) {
    if ($('#' + searchbox).length) {
        var input = document.getElementById(searchbox);
        if (!map) {
            map = new google.maps.Map(input);
        }        
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.bindTo('bounds', map);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            if (marker) {
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
            }
            CollectData(place);
        });

        function success(position) {
            map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));

            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                latLng: position.coords
            }, function (responses) {
                if (responses && responses.length > 0) {
                    CollectData(responses[0]);
                }
            });
        }

        $(".geo-location").on("click", function () {
            if (navigator.geolocation) {
                $('#' + element).addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                console.log('Geo Location is not supported');
            }
        });
    }
}

//CollectData ----------------------------------------------------------------------------------------------------------

function CollectData(place) {
    // console.log('map place ----------------',place)
    // appending values in free post form filed
    $('#map_place_id').val(place.place_id);
    $('#map_lat').val(place.geometry.location.lat);
    $('#map_lng').val(place.geometry.location.lng);
    //...

    $('#spanSelectedLocation').text(place.formatted_address);
    $('#spanSelectedLocationPlaceId').text(place.place_id);
    $('#spanSelectedLocationLatitude').text(place.geometry.location.lat);
    $('#spanSelectedLocationLongitude').text(place.geometry.location.lng);

    var table = document.getElementById("addressComponents");
    var rowCount = table.rows.length;
    for (var i = rowCount - 1; i > 0; i--) {
        table.deleteRow(i);
    }

    for (i = 0; i < place.address_components.length - 1; i++) {
        var row = table.insertRow(table.rows.length);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = place.address_components[i].types[0];
        cell2.innerHTML = place.address_components[i].short_name;
        cell3.innerHTML = place.address_components[i].long_name;
    }    
}