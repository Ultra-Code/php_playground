<?php

declare(strict_types=1);

namespace Playground;

class Router
{
    /** @param array<string , array<string,callable():string|array{class-string,string}>> $routes */
    // like this $this->routes[$request_type][$route] = $action;
    public function __construct(private array $routes = [])
    {
    }

    /**
     * @param callable(): string|array{class-string,string} $action
     */
    private function register(string $request_type, string $route, callable|array $action): Router
    {
        $this->routes[$request_type][$route] = $action;
        return $this;
    }

    /**
     * @param callable(): string|array{class-string,string} $action
     */
    public function get(string $route, callable|array $action): self
    {
        $this->register("GET", $route, $action);
        return $this;
    }

    /**
     * @param callable(): string|array{class-string,string} $action
     */
    public function post(string $route, callable|array $action): self
    {
        $this->register("POST", $route, $action);
        return $this;
    }

    public function resolve(string $request_type, string  $requestUri): string
    {
        $route = explode("?", $requestUri)[0];

        $action = $this->routes[$request_type][$route] ?? null ;

        if (!$action) {
            throw new Exceptions\RouteNotFound();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        /** @var class-string $class */
        /** @var string $method_name */
        [$class,$method_name] = $action;

        if (class_exists($class)) {
            $class_object = new $class();

            if (method_exists($class_object, $method_name)) {
                // return (string)call_user_func_array([$class_object,$method_name], []);
                return (string)$class_object->$method_name();
            }
        }

        throw new Exceptions\RouteNotFound();
    }
}
