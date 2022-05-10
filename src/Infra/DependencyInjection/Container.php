<?php

declare(strict_types=1);

namespace App\Infra\DependencyInjection;

use Symfony\Component\Form\Exception\LogicException;

class Container
{
    private array $services;

    public function __construct(...$services)
    {
        $this->services = $services;
    }

    public function get(string $serviceId): object
    {
        foreach ($this->services as $service)
        {
            if ($service::class === $serviceId) {
                return $service;
            }
        }

        throw new \LogicException('Unknown service '.$serviceId);
    }
}
