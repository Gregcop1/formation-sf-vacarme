<?php

declare(strict_types=1);

namespace App\Domain\EventListener;

use App\Infra\EventDispatcher\Events\RequestEvent;
use App\Infra\Http\Response;

class SecurityListener
{
    public function dispatch($event)
    {
        if (!$event instanceof RequestEvent) {
            return;
        }

        $request = $event->getRequest();
        $key = $request->queryGet('key');
        if ($key === null) {
            $event->setResponse(new Response('Key is missing.'));
        }
    }
}
