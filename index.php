<?php
include 'bootstrap/init.php';

$location = false;
if(isset($_GET['loc']) && is_numeric($_GET['loc']))
    $location = getSelectedLocation($_GET['loc']);

include BASE_PATH . 'template/index.php';