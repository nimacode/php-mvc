<?php

namespace App\Service\Router;

use App\Core\Request;
use App\Service\View\View;

class Router
{
    private static $routes;
    private static $baseControllerNamespace = "App\Controller\\";
    private static $baseMiddlewareNamespace = "App\Middleware\\";

    public static function register()
    {
        self::$routes = include_once ROUTES."web.php";
        $currentRoute = self::getCurrentRoute();
        if (self::isRouteDefined($currentRoute)) {

            if (!in_array(self::getCurrentMethod(),self::getRouteMethod($currentRoute))) {
                die('Request Method is Invalid.');
            }


            list($controllerName,$methodName) = explode('@',self::getRouteTarget($currentRoute));
            $controllerClass = self::$baseControllerNamespace.$controllerName;
            $controller = new $controllerClass;
            if (method_exists($controller,$methodName)) {
                // Middleware
                $request = new Request();
                $middlewareClass = self::$baseMiddlewareNamespace.self::getRouteMiddleware($currentRoute);
                if (class_exists($middlewareClass)) {
                    $middleware = new $middlewareClass;
                    $middleware->handle($request);
                }
                $controller->$methodName($request);
            } else {
                echo "Invalid Method Name";
            }


        }else {
            View::load('error.404');
        }
        exit;
    }

    public static function getCurrentRoute()
    {
        return strtok(strtolower($_SERVER['REQUEST_URI']),'?');
    }

    public static function isRouteDefined($routes)
    {
        return array_key_exists($routes,self::getRouts());
    }

    public static function getRouts()
    {
        return self::$routes;
    }

    public static function getRouteTarget($routes)
    {
        $getRoutes = self::getRouts();
        return $getRoutes[$routes]['target'];
    }

    public static function getRouteMethod($routes)
    {
        $getRoutes = self::getRouts();
        $methode = $getRoutes[$routes]['method'];
        return explode('|',$methode);
    }

    public static function getCurrentMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function getRouteMiddleware($routes)
    {
        $getRoutes = self::getRouts();
        return $getRoutes[$routes]['middleware'] ?? null;
    }
}