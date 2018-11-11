<?php
namespace Components\Router\Route;

interface RouteInterface
{
    public function getMethod();
    public function getPattern();
    public function getAction();
}