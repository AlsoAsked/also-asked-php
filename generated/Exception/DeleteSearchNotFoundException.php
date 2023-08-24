<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Exception;

class DeleteSearchNotFoundException extends NotFoundException
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
        parent::__construct('The requested resource wasn\'t found.
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
