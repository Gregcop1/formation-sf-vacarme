<?php

declare(strict_types=1);

namespace App\Infra\Http;

class Request
{
    private function __construct(private string $path, private array $get)
    {
    }

    public static function createFromGlobals(): self
    {
        return new self(
            $_SERVER['PATH_INFO'] ?? '/',
            $_GET
        );
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function queryGet(string $key, $default = null): mixed
    {
        return $this->get[$key] ?? $default;
    }
}
