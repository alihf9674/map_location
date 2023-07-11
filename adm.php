<?php
include 'bootstrap/init.php';
if (isset($_GET['logout']) && $_GET['logout'] == 1)
    logout();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!login($_POST['username'], $_POST['password']))
        message('نام کاربری یا رمز عبور اشتباه است.');
}

if (isLoggedIn()) {
    $params = $_GET ?? [];
    $locations = getLocations($params);
    include 'template/admin-panel.php';
} else {
    include 'template/auth.php';
}
