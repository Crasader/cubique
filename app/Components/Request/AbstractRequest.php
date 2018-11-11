<?php
namespace Components\Request;

use Components\Request\RequestInterface;
use Components\Common\GetterSetter;

abstract class AbstractRequest implements RequestInterface
{
    public $query;
    public $routeParams;
    private $method;
    private $uri;
    private $timestamp;
    private $valid = false;

    public function __construct()
    {
        $this->query = new GetterSetter(array_merge(
            $_REQUEST,
            $_GET,
            $_POST
        ));

        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->timestamp = $_SERVER['REQUEST_TIME'];
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getURI()
    {
        return $this->uri;
    }

    public function setRouteParams(array $routeParams) {
        $this->routeParams = new GetterSetter($routeParams);
        return $this;
    }

    public function setValid($flag)
    {
        $this->valid = $flag;
        return $this;
    }

    public function isValid()
    {
        return $this->valid;
    }
}