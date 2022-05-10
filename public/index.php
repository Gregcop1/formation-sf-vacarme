<?php
declare(strict_types=1);

spl_autoload_register(function (string $fqcn) {
    $path = __DIR__ . '/../' . str_replace(['App', '\\'], ['src', '/'], $fqcn) . '.php';
    require_once($path);
});

use App\Infra\DependencyInjection\Container;
use App\Infra\EventDispatcher\EventDispatcher;
use App\Infra\EventDispatcher\Events\RequestEvent;
use App\Infra\Http\Request;
use App\Infra\Http\Router;
use App\Infra\Log\Logger;

$eventDispatcher = new EventDispatcher();

$request = Request::createFromGlobals();

$requestEvent = new RequestEvent($request);
$eventDispatcher->dispatch($requestEvent);

if ($requestEvent->hasResponse()) {
    $requestEvent->getResponse()->send();
    exit(0);
}

$request = $requestEvent->getRequest();

$container = new Container(
    $request,
    new Logger(),
);

$path = $request->getPath();
$router = new Router();

echo '<pre>';
var_dump($path);
echo '</pre>';

$controllerClass = $router->getController($path);
$controller = new $controllerClass($container);
$response = $controller();

$response->send();
