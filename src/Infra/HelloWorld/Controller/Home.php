<?php

declare(strict_types=1);

namespace App\Infra\HelloWorld\Controller;

use App\Infra\DependencyInjection\Container;
use App\Infra\Http\Request;
use App\Infra\Http\Response;

class Home
{
    private Request $request;

    public function __construct(Container $container)
    {
        $this->request = $container->get(Request::class);
    }

    public function __invoke(): Response
    {
        $name = $this->request->queryGet('name') ?? 'Anonymous';
        return new Response('Home '.$name);
    }
}
