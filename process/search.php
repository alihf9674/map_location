<?php
include '../bootstrap/init.php';
usleep(500000);

if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
    diePage("Invalid Request!");

$keyword = $_POST['keyword'];
if (!isset($keyword) or empty($keyword))
    die("نتیجه ای یافت نشد ...");

$locations = getLocations(['keyword' => $keyword]);
if (sizeof($locations) == 0)
    die("نتیجه ای یافت نشد ...");

foreach ($locations as $location) {
    echo "<a href='" . BASE_URL . "?loc=$location->id'><div class='result-item' data-lat='$location->lat' data-lng='$location->lng' data-loc='$location->id'>
        <span class='loc-type'>" . locationTypes[$location->type] . "</span>
        <span class='loc-title'>$location->title</span>
    </div></a>";
}