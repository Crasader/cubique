<?php
namespace Components\Router;

interface RouterInterface
{
    public static function get($pattern, $action);
    public static function post($pattern, $action);
    public static function lookup();
}