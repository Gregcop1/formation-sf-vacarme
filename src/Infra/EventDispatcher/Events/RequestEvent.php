<?php

declare(strict_types=1);

namespace App\Infra\EventDispatcher\Events;

use App\Infra\Http\Request;
use App\Infra\Http\Response;

class RequestEvent
{
    private ?Response $response = null;

    public function __construct(private Request $request)
    {
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function hasResponse(): bool
    {
        return $this->response instanceof Response;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }
}
