<?php
class Router
{
    private $routes = [];

    public function addRoute($path, $handler)
    {
        $this->routes[$path] = $handler;
    }

    public function handleRequest()
    {
        $requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $queryParams = $_GET;

        foreach ($this->routes as $path => $handler) {
            // Convert route path to regex if needed
            $pattern = '#^' . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($path)) . '$#';

            // Check for exact match first
            if ($path === $requestUri) {
                $this->executeHandler($handler, [], $queryParams);
                return;
            }

            // Check for regex match
            if (preg_match($pattern, $requestUri, $matches)) {
                array_shift($matches); // Remove full match, keep only groups
                $this->executeHandler($handler, $matches, $queryParams);
                return;
            }
        }

        // 404 handling
        http_response_code(404);
        echo "Page not found";
    }

    protected function executeHandler($handler, $matches, $queryParams)
    {
        if (is_callable($handler)) {
            call_user_func_array($handler, array_merge($matches, $queryParams));
        } else {
            // Extract variables from query string and matches
            extract($queryParams);
            extract(array_combine(
                array_map(function ($k) {
                    return 'match_' . $k;
                }, array_keys($matches)),
                $matches
            ));
            require $handler;
        }
    }
}