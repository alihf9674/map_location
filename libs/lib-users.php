<?php
function isLoggedIn()
{
    return isset($_SESSION['login']);
}

function login($username, $password)
{
    global $admins;
    if (array_key_exists($username, $admins) && password_verify($password, $admins[$username])) {
        $_SESSION['login'] = 1;
        return true;
    }
    return false;
}

function logout()
{
    unset($_SESSION['login']);
}