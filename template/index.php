<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="assets/css/styles.css<?= "?v=" . rand(99, 9999999) ?>"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
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

<div class="modal-overlay" style="display: none;">
    <div class="modal">
        <span class="close">x</span>
        <h3 class="modal-title">ثبت لوکیشن</h3>
        <div class="modal-content">
            <form id='add-location-form' action="<?= url('process/addLocation.php') ?>" method="post">
                <div class="field-row">
                    <div class="field-title">مختصات</div>
                    <div class="field-content">
                        <input type="text" name='lat' id="lat-display" readonly
                               style="width: 160px;text-align: center;">
                        <input type="text" name='lng' id="lng-display" readonly
                               style="width: 160px;text-align: center;">
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">نام مکان</div>
                    <div class="field-content">
                        <input type="text" name="title" id='l-title' placeholder="">
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">نوع</div>
                    <div class="field-content">
                        <select name="type" id='l-type'>
                            <?php foreach (locationTypes as $key => $locationType) { ?>
                                <option value="<?= $key ?>"><?= $locationType ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">ذخیره نهایی</div>
                    <div class="field-content">
                        <input type="submit" value=" ثبت ">
                    </div>
                </div>
                <div class="ajax-result"></div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
