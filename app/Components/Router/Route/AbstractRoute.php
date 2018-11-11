<?php
namespace Components\Router\Route;

use Components\Router\Route\RouteInterface;

abstract class AbstractRoute implements RouteInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    
    private $method;
    private $pattern;
    private $action;
}