<?php
namespace Components\Router\Route;

use Components\Router\Route\AbstractRoute;

class Route extends AbstractRoute
{
    public function __construct($method, $pattern, $action)
    {
        $this->method = $method;
        $this->pattern = $pattern;
        $this->action = $action;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function getAction()
    {
        return $this->action;
    }
}