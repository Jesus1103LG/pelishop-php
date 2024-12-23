<?php
$folderPath = dirname($_SERVER["SCRIPT_NAME"]);
$urlPaht = $_SERVER["REQUEST_URI"];
$url = substr($urlPaht, strlen($folderPath));

define("URL", $url);
