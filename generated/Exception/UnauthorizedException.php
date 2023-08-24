<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Exception;

class UnauthorizedException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 401);
    }
}
