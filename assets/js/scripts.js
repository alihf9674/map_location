const defaultLocation = [35.722, 51.328];
const defaultZoom = 15;
var map = L.map('map').setView(defaultLocation, defaultZoom);
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

document.getElementById('map').style.setProperty('height', window.innerHeight + 'px');

map.on('dblclick', function (e) {
    L.marker(e.latlng).addTo(map);
    $('.modal-overlay').fadeIn(500);
    $('#lat-display').val(e.latlng.lat);
    $('#lng-display').val(e.latlng.lng);
    $('#l-type').val(0);
    $('#l-title').val('');
});

// find current location
var current_position, current_accuracy;
map.on('locationfound', function (e) {
    // if position defined, then remove the existing position marker and accuracy circle from the map
    if (current_position) {
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);
    }
    var radius = e.accuracy / 2;
    current_position = L.marker(e.latlng).addTo(map)
        .bindPopup("دقت تقریبی: " + radius + " متر").openPopup();
    current_accuracy = L.circle(e.latlng, radius).addTo(map);
});
map.on('locationerror', function (e) {
    alert(e.message);
});

function locate() {
    map.locate({setView: true, maxZoom: defaultZoom});
}

$(document).ready(function () {
    $('form#add-location-form').submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var result = form.find('.ajax-result');
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            method: form.attr('method'),
            success: function (response) {
                result.html(response);
            }
        });
    });

    $('.modal-overlay .close').click(function () {
        $('.modal-overlay').fadeOut();
    });
});

