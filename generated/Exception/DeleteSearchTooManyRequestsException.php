<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Exception;

class DeleteSearchTooManyRequestsException extends TooManyRequestsException
{
    /**
     * @var \AlsoAsked\Api\Model\Error
     */
    private $error;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\AlsoAsked\Api\Model\Error $error, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('The "rate limit exceeded" error occurs when the client has made too many requests in a short period of time.
');
        $this->error = $error;
        $this->response = $response;
    }

    public function getError(): \AlsoAsked\Api\Model\Error
    {
        return $this->error;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
