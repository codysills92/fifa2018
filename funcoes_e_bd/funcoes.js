/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var map = null;
var geocoder = null;
var from;
var to;
var directionsPanel = null;
var directions = null;

function start() {
    if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("mapa_base"));
        map.setCenter(new GLatLng(55.7522200, 37.6155600), 5);
        geocoder = new GClientGeocoder();
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        directionsPanel = document.getElementById("route");
        directions = new GDirections(map, directionsPanel);

    }
}

function gerarRota() {
    from = document.getElementById("partida").value;
    to = document.getElementById("Rua da Universidade, 4704-553 Braga").value;
    if (geocoder) {
        geocoder.getLatLng(from,
                function(point) {
                    if (!point) {
                        alert(from + " não encontrado");
                    }
                }
        );
        geocoder.getLatLng(to,
                function(point) {
                    if (!point) {
                        alert(to + " não encontrado");
                    }
                }
        );

        var string = "from: " + from + " to: " + to;
        directions.clear();
        directions.load(string);
        GEvent.addListener(directions, "error", erroGetRoute);
    } else {
        alert("GeoCoder não identificado");
    }
}

function erroGetRoute() {
    alert("Não foi possivel traçar a rota de: " + from + " para: " + to + "!");
}
var map, places, infoWindow;
var markers = [];
var autocomplete;
var countryRestrict = {'country': 'ru'};
var MARKER_PATH = 'https://maps.gstatic.com/intl/en_us/mapfiles/marker_green';
var hostnameRegexp = new RegExp('^https?://.+?/');

var countries = {
    'ru': {
        center: new google.maps.LatLng(55.751244, 37.618423),
        zoom: 3
    },
};
function toggle_visibility(id) {
    var div = document.getElementById(id);
    if (div.style.display == 'none') {
        div.style.display = 'block';
    }
    else {
        div.style.display = 'none';
    }
}
function initialize() {
    var myOptions = {
        zoom: countries['ru'].zoom,
        center: countries['ru'].center,
        mapTypeControl: false,
        panControl: false,
        zoomControl: false,
        streetViewControl: false

    };

    map = new google.maps.Map(document.getElementById('mapa_base'), myOptions);

    infoWindow = new google.maps.InfoWindow({
        content: document.getElementById('info-content')
    });

    //Inicia a pesquisa apartir da cidade predefinida , neste caso moscovo-russia
    //Cria um objeto autocomplete que sugere a cidade conforme o nome a ser introduzido
    autocomplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
            {
                types: ['(cities)'],
                componentRestrictions: countryRestrict
            });
    places = new google.maps.places.PlacesService(map);

    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);

    // Add a DOM event listener to react when the user selects a country.
    google.maps.event.addDomListener(document.getElementById('country'), 'change',
            setAutocompleteCountry);

}

// When the user selects a city, get the place details for the city and
// zoom the map in on the city.
function onPlaceChanged() {
    var place = autocomplete.getPlace();
    if (place.geometry) {
        map.panTo(place.geometry.location);
        map.setZoom(15);
        search();
    } else {
        document.getElementById('autocomplete').placeholder = 'Enter a city';
    }

}

// Search for hotels in the selected city, within the viewport of the map.
function search() {
    var search = {
        bounds: map.getBounds(),
        types: ['lodging']
    };

    places.nearbySearch(search, function(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            clearResults();
            clearMarkers();
            // Create a marker for each hotel found, and
            // assign a letter of the alphabetic to each marker icon.
            for (var i = 0; i < results.length; i++) {
                var markerLetter = String.fromCharCode('A'.charCodeAt(0) + i);
                var markerIcon = MARKER_PATH + markerLetter + '.png';
                // Use marker animation to drop the icons incrementally on the map.
                markers[i] = new google.maps.Marker({
                    position: results[i].geometry.location,
                    animation: google.maps.Animation.DROP,
                    icon: markerIcon
                });
                // If the user clicks a hotel marker, show the details of that hotel
                // in an info window.
                markers[i].placeResult = results[i];
                google.maps.event.addListener(markers[i], 'click', showInfoWindow);
                setTimeout(dropMarker(i), i * 100);
                addResult(results[i], i);
            }
        }
    });
}

function clearMarkers() {
    for (var i = 0; i < markers.length; i++) {
        if (markers[i]) {
            markers[i].setMap(null);
        }
    }
    markers = [];
}

// [START region_setcountry]
// Set the country restriction based on user input.
// Also center and zoom the map on the given country.
function setAutocompleteCountry() {
    var country = document.getElementById('country').value;
    if (country == 'all') {
        autocomplete.setComponentRestrictions([]);
        map.setCenter(new google.maps.LatLng(15, 0));
        map.setZoom(2);
    } else {
        autocomplete.setComponentRestrictions({'country': country});
        map.setCenter(countries[country].center);
        map.setZoom(countries[country].zoom);
    }
    clearResults();
    clearMarkers();
}
// [END region_setcountry]

function dropMarker(i) {
    return function() {
        markers[i].setMap(map);
    };
}

function addResult(result, i) {
    var results = document.getElementById('results');
    var markerLetter = String.fromCharCode('A'.charCodeAt(0) + i);
    var markerIcon = MARKER_PATH + markerLetter + '.png';

    var tr = document.createElement('tr');
    tr.style.backgroundColor = (i % 2 == 0 ? '#F0F0F0' : '#FFFFFF');
    tr.onclick = function() {
        google.maps.event.trigger(markers[i], 'click');
    };

    var iconTd = document.createElement('td');
    var nameTd = document.createElement('td');
    var icon = document.createElement('img');
    icon.src = markerIcon;
    icon.setAttribute('class', 'placeIcon');
    icon.setAttribute('className', 'placeIcon');
    var name = document.createTextNode(result.name);
    iconTd.appendChild(icon);
    nameTd.appendChild(name);
    tr.appendChild(iconTd);
    tr.appendChild(nameTd);
    results.appendChild(tr);
}

function clearResults() {
    var results = document.getElementById('results');
    while (results.childNodes[0]) {
        results.removeChild(results.childNodes[0]);
    }
}

// Get the place details for a hotel. Show the information in an info window,
// anchored on the marker for the hotel that the user selected.
function showInfoWindow() {

    var marker = this;
    places.getDetails({placeId: marker.placeResult.place_id},
    function(place, status) {
        if (status != google.maps.places.PlacesServiceStatus.OK) {
            return;
        }
        infoWindow.open(map, marker);
        buildIWContent(place);

    });
}

// Load the place information into the HTML elements used by the info window.
function buildIWContent(place) {
    document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon" ' +
            'src="' + place.icon + '"/>';
    document.getElementById('iw-url').innerHTML = '<b><a href="' + place.url +
            '">' + place.name + '</a></b>';
    document.getElementById('iw-address').textContent = place.vicinity;

    if (place.formatted_phone_number) {
        document.getElementById('iw-phone-row').style.display = '';
        document.getElementById('iw-phone').textContent =
                place.formatted_phone_number;
    } else {
        document.getElementById('iw-phone-row').style.display = 'none';
    }

    // Assign a five-star rating to the hotel, using a black star ('&#10029;')
    // to indicate the rating the hotel has earned, and a white star ('&#10025;')
    // for the rating points not achieved.
    if (place.rating) {
        var ratingHtml = '';
        for (var i = 0; i < 5; i++) {
            if (place.rating < (i + 0.5)) {
                ratingHtml += '&#10025;';
            } else {
                ratingHtml += '&#10029;';
            }
            document.getElementById('iw-rating-row').style.display = '';
            document.getElementById('iw-rating').innerHTML = ratingHtml;
        }
    } else {
        document.getElementById('iw-rating-row').style.display = 'none';
    }

    // The regexp isolates the first part of the URL (domain plus subdomain)
    // to give a short URL for displaying in the info window.
    if (place.website) {
        var fullUrl = place.website;
        var website = hostnameRegexp.exec(place.website);
        if (website == null) {
            website = 'http://' + place.website + '/';
            fullUrl = website;
        }
        document.getElementById('iw-website-row').style.display = '';
        document.getElementById('iw-website').textContent = website;
    } else {
        document.getElementById('iw-website-row').style.display = 'none';
    }
}


function start2() {
    var mapOptions = {
        zoom: 11,
        center: new google.maps.LatLng(55.7522200, 37.6155600),
        mapTypeId: google.maps.MapTypeId.TERRAIN
    };
    map = new google.maps.Map(document.getElementById('mapa_base'),
            mapOptions);
    var weatherLayer = new google.maps.weather.WeatherLayer({
        temperatureUnits: google.maps.weather.TemperatureUnit.KELVIN
    });
    weatherLayer.setMap(map);

    var cloudLayer = new google.maps.weather.CloudLayer();
    cloudLayer.setMap(map);

}
google.maps.event.addDomListener(window, 'load', start2);
function obterEndereco() {
    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById("endereco").value;
    geocoder.geocode({'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            latitude = results[0].geometry.location.lat();
            longitude = results[0].geometry.location.lng();

            var panPoint = new google.maps.LatLng(latitude, longitude);
            map.panTo(panPoint);
        } else {
            alert("Localização não encontrada");
        }
    })
}
var req;
function validarDados(campo, valor) {
    if (window.XMLHttpRequest) {

        req = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        ("Microsoft.XMLHTTP");

    }
    var url = "login.php?campo=" + campo + "&valor=" + valor;
    req.open("Get", url, true);
    req.onreadystatechange = function() {
        if (req.readyState == 1) {
            document.getElementById('campo_' + campo + '').innerHTML = '<font color="gray">Verificando...</font>';
        }

        if (req.readyState == 4 && req.status == 200) {
            var resposta = req.responseText;
            document.getElementById('campo_' + campo + '').innerHTML = resposta;
        }
    }
    req.send(null);
}