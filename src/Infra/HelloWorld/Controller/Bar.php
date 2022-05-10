<?php

declare(strict_types=1);

namespace App\Infra\HelloWorld\Controller;

use App\Infra\Http\Response;

class Bar
{
    public function __invoke(): Response
    {
        return new Response('Bar');
    }
}
