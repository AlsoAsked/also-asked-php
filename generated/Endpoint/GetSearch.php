<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Endpoint;

class GetSearch extends \AlsoAsked\Api\Runtime\Client\BaseEndpoint implements \AlsoAsked\Api\Runtime\Client\Endpoint
{
    protected $searchId;

    /**
     * Get the details of a search request, and if the search request has completed successfully, obtain the search results.
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
        return 'GET';
    }

    public function getUri(): string
    {
        return \str_replace(['{searchId}'], [$this->searchId], '/search/{searchId}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @inheritDoc
     *
     * @throws \AlsoAsked\Api\Exception\GetSearchForbiddenException
     * @throws \AlsoAsked\Api\Exception\GetSearchInternalServerErrorException
     * @throws \AlsoAsked\Api\Exception\GetSearchNotFoundException
     * @throws \AlsoAsked\Api\Exception\GetSearchPaymentRequiredException
     * @throws \AlsoAsked\Api\Exception\GetSearchServiceUnavailableException
     * @throws \AlsoAsked\Api\Exception\GetSearchTooManyRequestsException
     * @throws \AlsoAsked\Api\Exception\GetSearchUnauthorizedException
     * @throws \AlsoAsked\Api\Exception\UnexpectedStatusCodeException
     *
     * @return \AlsoAsked\Api\Model\SearchRequestResults
     */
    protected function transformResponseBody(
        \Psr\Http\Message\ResponseInterface $response,
        \Symfony\Component\Serializer\SerializerInterface $serializer,
        ?string $contentType = null,
    ) {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();

        if (\is_null($contentType) === false && ($status === 200 && \mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'AlsoAsked\Api\Model\SearchRequestResults', 'json');
        }

        if (\is_null($contentType) === false && ($status === 401 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetSearchUnauthorizedException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 402 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetSearchPaymentRequiredException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 403 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetSearchForbiddenException($response);
        }

        if (\is_null($contentType) === false && ($status === 404 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetSearchNotFoundException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 429 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetSearchTooManyRequestsException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 500 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetSearchInternalServerErrorException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 503 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetSearchServiceUnavailableException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        throw new \AlsoAsked\Api\Exception\UnexpectedStatusCodeException($status, $body);
    }

    public function getAuthenticationScopes(): array
    {
        return ['apiKey'];
    }
}
