<?php

session_start(); //gets session id from cookies, or prepa

if (session_id() == '' || !isset($_SESSION['login'])) { //if sid exists and login for sid exists
    include './views/layouts/login.php';
} else {
    include './views/layouts/home.php';
}

