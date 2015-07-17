<?php

function GET($key, $default = null) {
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function POST($key, $default = null) {
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function SESSION($key, $default = null) {
    return isset($_SESSION[$key]) ? $_GET[$key] : $default;
}