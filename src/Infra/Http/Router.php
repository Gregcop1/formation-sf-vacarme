<?php
# src/Infra/Http/Router.php
declare(strict_types=1);

namespace App\Infra\Http;

use App\Infra\Errors\Controller\NotFound;
use App\Infra\HelloWorld\Controller\Bar;
use App\Infra\HelloWorld\Controller\Home;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->routes = [
            '/' => Home::class,
            '/bar' => Bar::class,
            '/not-found' => NotFound::class,
        ];
    }

    public function getController(string $path): string
    {
        return $this->routes[$path] ?? $this->routes['/not-found'];
    }
}
