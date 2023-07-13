<?php
include '../bootstrap/init.php';

if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'())
    diePage("Invalid Request!");

if (is_null($_POST['loc']) || !is_numeric($_POST['loc']))
    diePage("Invalid Location");

echo toggleStatus($_POST['loc']);