<?php

declare(strict_types=1);

namespace App\Infra\Log;

class Logger
{
    private const PATH = __DIR__.'/../../../var/log/error.log';

    public function log(string $message)
    {
        file_put_contents(self::PATH, $message.PHP_EOL, FILE_APPEND);
    }
}
