<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Exception;

class PerformSearchBadRequestException extends BadRequestException
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
        parent::__construct('The request body is invalid. This error is returned when the request body isn\'t valid JSON or when the request body
content type isn\'t `application/json`.
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
