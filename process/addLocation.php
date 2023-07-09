<?php
include '../bootstrap/init.php';

if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
    diePage("Invalid Request!");

if (addLocation($_POST)) {
    echo "مکان با موفقیت در پایگاه داده ثبت شد و منتظر تایید مدیر است.";
} else {
    echo "مشکلی در ثبت مکان پیش آمده است";
}