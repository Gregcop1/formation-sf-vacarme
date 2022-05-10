<?php

declare(strict_types=1);

namespace App\Infra\EventDispatcher;

use App\Domain\EventListener\SecurityListener;

class EventDispatcher
{
    private array $listeners;

    public function __construct()
    {
        $this->listeners[] = new SecurityListener();
    }

    public function dispatch($event): void
    {
        foreach ($this->listeners as $listener) {
            $listener->dispatch($event);
        }
    }


}
