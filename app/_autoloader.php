<?php
define('CONTROLLER', '../controllers/');
define('APP', '../app/');

spl_autoload_register(function ($namespace)
{
    $class = str_replace('\\', '/', $namespace) . '.php';
    
    if (file_exists(APP . $class)) {
        require_once APP . $class;
    } else if (file_exists(CONTROLLER . $class)) {
        require_once CONTROLLER . $class;
    }
});

Components\Router\Router::handleRequest(new Components\Request\Request());
require_once '../web/routes/routes.php';
Components\Router\Router::lookup();