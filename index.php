<?php

error_reporting(-1);
ini_set('error_reporting', E_ALL);

require_once ('autoload.php');

$hasPost = (count($_POST) > 0) ? true : false;

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
} elseif ($hasPost) {
    $controller = 'pages';
    $action = 'sort';
} else {
    $controller = 'pages';
    $action     = 'home';
}

require_once('views/layout.php');
