<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Endpoint;

class DeleteSearch extends \AlsoAsked\Api\Runtime\Client\BaseEndpoint implements \AlsoAsked\Api\Runtime\Client\Endpoint
{
    protected $searchId;

    /**
     * Delete a search request. The search results will be deleted from the cache and the search result's term masked in the
     * search history.
     *
     * @param string $searchId the ID of the search request
     */
    public function __construct(string $searchId)
    {
        $this->searchId = $searchId;
    }

    use \AlsoAsked\Api\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return \str_replace(['{searchId}'], [$this->searchId], '/search/{searchId}');
    }

    public function getBody(
        \Symfony\Component\Serializer\SerializerInterface $serializer,
        $streamFactory = null,
    ): array {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @inheritDoc
     *
     * @throws \AlsoAsked\Api\Exception\DeleteSearchForbiddenException
     * @throws \AlsoAsked\Api\Exception\DeleteSearchInternalServerErrorException
     * @throws \AlsoAsked\Api\Exception\DeleteSearchNotFoundException
     * @throws \AlsoAsked\Api\Exception\DeleteSearchPaymentRequiredException
     * @throws \AlsoAsked\Api\Exception\DeleteSearchServiceUnavailableException
     * @throws \AlsoAsked\Api\Exception\DeleteSearchTooManyRequestsException
     * @throws \AlsoAsked\Api\Exception\DeleteSearchUnauthorizedException
     * @throws \AlsoAsked\Api\Exception\UnexpectedStatusCodeException
     *
     * @return null
     */
    protected function transformResponseBody(
        \Psr\Http\Message\ResponseInterface $response,
        \Symfony\Component\Serializer\SerializerInterface $serializer,
        ?string $contentType = null,
    ) {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();

        if ($status === 204) {
            return null;
        }

        if (\is_null($contentType) === false && ($status === 401 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\DeleteSearchUnauthorizedException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 402 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\DeleteSearchPaymentRequiredException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 403 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\DeleteSearchForbiddenException($response);
        }

        if (\is_null($contentType) === false && ($status === 404 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\DeleteSearchNotFoundException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 429 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\DeleteSearchTooManyRequestsException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 500 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\DeleteSearchInternalServerErrorException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 503 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\DeleteSearchServiceUnavailableException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        throw new \AlsoAsked\Api\Exception\UnexpectedStatusCodeException($status, $body);
    }

    public function getAuthenticationScopes(): array
    {
        return ['apiKey'];
    }
}
