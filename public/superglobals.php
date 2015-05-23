<?php
/*
 * superglobals.php
 * 20150523 kgoe
 * contains a demonstration of core php superglobals
 */

htmlp("GLOBALS");
var_dump($GLOBALS);

htmlp("SERVER");
var_dump($_SERVER);

htmlp("GET");
var_dump($_GET);

htmlp("POST");
var_dump($_POST);

htmlp("FILES");
var_dump($_FILES);

htmlp("COOKIE");
var_dump($_COOKIE);

htmlp("SESSION");
var_dump($_SESSION);

htmlp("REQUEST");
var_dump($_REQUEST);

htmlp("ENV");
var_dump($_ENV);

function htmlp($str) { echo "<p>".$str."</p>"; }
?>