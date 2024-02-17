<?php
namespace App\Core;

class Router{
    private static array $routes = [];

    public static function add($method, $path, $controller, $function)
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function
        ];
    }

    public static function group($path, $controller, $routes)
    {
        foreach ($routes as $route) {
            self::add($route[0], $path . $route[1], $controller, $route[2]);
        }
    }

    public static function resource($path, $controller)
    {
        self::add('GET', $path, $controller, 'index');
        self::add('GET', $path . '/create', $controller, 'create');
        self::add('POST', $path . '/store', $controller, 'store');
        self::add('GET', $path . '/{id}', $controller, 'show');
        self::add('GET', $path . '/{id}/edit', $controller, 'edit');
        self::add('PUT', $path . '/{id}', $controller, 'update');
        self::add('PATCH', $path . '/{id}', $controller, 'update');
        self::add('POST', $path . '/{id}', $controller, 'update');
        self::add('DELETE', $path . '/{id}', $controller, 'destroy');
    }

    public static function to($to)
    {
        http_response_code(302);
        header('Location: '.$to);
        die();
    }

    private static function path()
    {
        $path = "/";

        $path = $_SERVER['PATH_INFO'] ?? $path;
        $path = $path == '/' && $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $path;
        $path = $path == '/index.php' ? '/' : $path;

        if ($path != "/") $path = rtrim($path, '/');

        return $path;
    }

    private static function pattern($str)
    {
        $pattern = preg_replace("/{[0-9a-zA-Z]*}/", '([0-9a-zA-Z]*)', $str);
        $pattern = "#^" . $pattern . "$#";

        return $pattern;
    }

    public static function run()
    {
        $path = self::path();

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = self::pattern($route['path']);

            if (preg_match($pattern, $path, $variables) && $method == $route['method']) {
                $function = $route['function'];
                $controller = new $route['controller'];
                
                array_shift($variables);

                call_user_func_array([$controller, $function], $variables);

                return;
            }
        }

        http_response_code(404);
        echo '404 NOT FOUND';
    }

    public static function redirect($from, $to)
    {
        $path = self::path();

        $pattern = self::pattern($from);
        
        if (preg_match($pattern, $path) && $_SERVER['REQUEST_METHOD'] == 'GET') {
            self::to($to);
        }
        return;
    }

    public static function list()
    {
        return self::$routes;
    }
}
