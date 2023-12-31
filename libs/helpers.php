<?php defined('BASE_PATH') or die("Permission Denied!");

function dd($var)
{
    echo "<pre style='direction: ltr; text-align: left;color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
    var_dump($var);
}

function diePage($msg)
{
    echo "<div style='padding: 30px; width: 80%; margin: 50px auto; background: #f9dede; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;'>$msg</div>";
    die();
}

function url($uri = '')
{
    return BASE_URL . $uri;
}

function message($message, $cssClass = 'info')
{
    echo "<div class='$cssClass' style='padding: 20px; width: 80%; margin: 10px auto; background: #f9dede; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;'>$message</div>";
}
