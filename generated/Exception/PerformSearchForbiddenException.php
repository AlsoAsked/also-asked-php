<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Exception;

class PerformSearchForbiddenException extends ForbiddenException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(?\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('The forbidden error object is returned in the response body of any request that results a `403 Forbidden` error.
');
        $this->response = $response;
    }

    public function getResponse(): ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
