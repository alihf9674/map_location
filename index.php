<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="assets/css/leaflet.css">
    <link rel="stylesheet" href="assets/css/styles.css<?= "?v=" . rand(99, 9999999) ?>"/>
    <script src="assets/js/leaflet.js"></script>
</head>
<body>
<div class="main">
    <div class="head">
        <div class="search-box">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟" autocomplete="off">
        </div>
    </div>
    <div class="mapContainer">
        <div id="map"></div>
    </div>

</div>

<script>
    const map = L.map('map').setView([32.653, 51.674], 15);
    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    document.getElementById('map').style.setProperty('height', window.innerHeight + 'px');
</script>
</body>
</html>