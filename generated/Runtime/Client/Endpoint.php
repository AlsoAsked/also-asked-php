<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Runtime\Client;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

interface Endpoint
{
    /**
     * Get body for an endpoint.
     *
     * Return value consist of an array where the first item will be a list of headers to add on the request (like the Content Type)
     * And the second value consist of the body object.
     *
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     * @param mixed|null $streamFactory
     */
    public function getBody(SerializerInterface $serializer, $streamFactory = null): array;

    /**
     * Get the query string of an endpoint without the starting ? (like foo=foo&bar=bar).
     */
    public function getQueryString(): string;

    /**
     * Get the URI of an endpoint (like /foo-uri).
     */
    public function getUri(): string;

    /**
     * Get the HTTP method of an endpoint (like GET, POST, ...).
     */
    public function getMethod(): string;

    /**
     * Get the headers of an endpoint.
     *
     * @param array $baseHeaders
     */
    public function getHeaders(array $baseHeaders = []): array;

    /**
     * Get security scopes of an endpoint.
     */
    public function getAuthenticationScopes(): array;

    /**
     * Parse and transform a PSR7 Response into a different object.
     *
     * Implementations may vary depending the status code of the response and the fetch mode used.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     * @param string $fetchMode
     */
    public function parseResponse(
        ResponseInterface $response,
        SerializerInterface $serializer,
        string $fetchMode = Client::FETCH_OBJECT,
    );
}
