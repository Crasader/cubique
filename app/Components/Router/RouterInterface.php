<?php
namespace Components\Router;

interface RouterInterface
{
    public static function get(string $route, string $action);
    public static function post(string $route, string $action);
    public static function lookup();
}