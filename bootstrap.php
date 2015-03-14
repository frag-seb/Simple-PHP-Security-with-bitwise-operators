<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$loader = require 'vendor/autoload.php';
$loader->add('Security\\', __DIR__."/src");
$loader->register();
