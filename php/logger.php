<?php

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;

require_once __DIR__."/../vendor/autoload.php";

$log = new Logger('main');
$log->pushHandler(new RotatingFileHandler('../logs/php.log'));