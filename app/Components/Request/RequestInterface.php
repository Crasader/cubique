<?php
namespace Components\Request;

interface RequestInterface
{
    public function getMethod();
    public function getURI();
    public function setRouteParams(array $routeParams);
    public function setValid($flag);
    public function isValid();
}