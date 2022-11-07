<?php

require_once 'exceptions/LongLoginException.php';
require_once 'Logger.php';

try {
    $controller = $_GET['controller'] ?? 'index';

    $routes = require 'routes.php';

    require_once $routes[$controller];

}catch (LongLoginException $e) {
    $logger = new Logger('long_login');
    $logger->log($e->getMessage());
    die($e->getMessage());
}catch (Exception $e) {
    $logger = new Logger('error_handler');
    $logger->log($e->getMessage());
    include 'view/error.php';
    die();
}