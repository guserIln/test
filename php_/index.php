<?php


if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}



require 'application/config/config.php';

  session_start();

require 'application/libs/application.php';
require 'application/libs/controller.php';
$app = new Application();
