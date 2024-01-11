<?php

declare(strict_types=1);

namespace Playground;

class Router
{
    /** @param array<string , callable():string|array<callable():string>> $routes */
    public function __construct(private array $routes = [])
    {
    }

    /**
     * @param callable(): string|array<callable(): string> $action
     */
    public function register(string $route, callable|array $action): Router
    {
        $this->routes[$route] = $action;
        return $this;
    }

    public function resolve(string  $requestUri): string
    {
        $route = explode("?", $requestUri)[0];

        $action = $this->routes[$route] ?? null ;

        if (!$action) {
            throw new Exceptions\RouteNotFound();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class,$method_name] = $action;

            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method_name)) {
                    return call_user_func_array([$class,$method_name], []);
                }
            }
        }

        throw new Exceptions\RouteNotFound();
    }
}
