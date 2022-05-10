<?php

declare(strict_types=1);

namespace App\Infra\Errors\Controller;

use App\Infra\DependencyInjection\Container;
use App\Infra\Http\Response;
use App\Infra\Log\Logger;

class NotFound
{
    private Logger $logger;

    public function __construct(Container $container)
    {
        $this->logger = $container->get(Logger::class);
    }

    public function __invoke(): Response
    {
        $this->logger->log('Unknown route');
        return new Response('404 - Not Found');
    }
}
