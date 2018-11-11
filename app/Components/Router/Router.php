<?php
namespace Components\Router;

use Components\Router\RouterInterface;
use Components\Router\Route\Route;
use Components\Router\PathExtractor;
use Components\Request\Request;
use Components\Response\ResponseHandler;

abstract class Router implements RouterInterface
{
    private static $routes = [];
    private static $request;
    private static $responseHandler;

    public static function handleRequest(Request $request)
    {
        self::$request = $request;
        self::$responseHandler = new ResponseHandler($request);
    }

    public static function get($pattern, $action)
    {
        $route = new Route(Route::METHOD_GET, $pattern, $action);
        array_push(self::$routes, $route);
    }

    public static function post($pattern, $action)
    {
        $route = new Route(Route::METHOD_POST, $pattern, $action);
        array_push(self::$routes, $route);
    }

    public static function lookup()
    {
        foreach (self::$routes as $route) {
           $flag = self::matcher($route);
           if ($flag === true) {
               break;
           }
        }

        self::$responseHandler->handle();
    }

    private static function matcher(Route $route)
    {
        $pathExtractor = new PathExtractor();

        if ($route->getMethod() !== self::$request->getMethod()) {
            return false;
        }

        $routeParams = $pathExtractor->extract($route->getPattern(), self::$request->getURI());
        if ($routeParams === false) {
            return false;
        }

        self::$request
            ->setValid(true)
            ->query->set('RouteParams', $routeParams);

        return true;
    }
}