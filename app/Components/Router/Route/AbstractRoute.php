<?php
namespace Components\Router\Route;

use Components\Router\Route\RouteInterface;

abstract class AbstractRoute implements RouteInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_UPDATE = 'UPDATE';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PATCH = 'PATCH';
    
    protected $method;
    protected $pattern;
    protected $action;
}