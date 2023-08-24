<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Endpoint;

class ListSearches extends \AlsoAsked\Api\Runtime\Client\BaseEndpoint implements \AlsoAsked\Api\Runtime\Client\Endpoint
{
    /**
     * Get a paginated list of searches performed by the current user, sorted by the date they were created, with the most
     * recent searches appearing first.
     *
     * @param array $queryParameters {
     *
     * @var int $count the number of results to return
     * @var int $page The page of results to return.
     *
     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    use \AlsoAsked\Api\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/search';
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

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['count', 'page']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['count' => 10, 'page' => 1]);
        $optionsResolver->addAllowedTypes('count', ['int']);
        $optionsResolver->addAllowedTypes('page', ['int']);

        return $optionsResolver;
    }

    /**
     * @inheritDoc
     *
     * @throws \AlsoAsked\Api\Exception\ListSearchesForbiddenException
     * @throws \AlsoAsked\Api\Exception\ListSearchesInternalServerErrorException
     * @throws \AlsoAsked\Api\Exception\ListSearchesPaymentRequiredException
     * @throws \AlsoAsked\Api\Exception\ListSearchesServiceUnavailableException
     * @throws \AlsoAsked\Api\Exception\ListSearchesTooManyRequestsException
     * @throws \AlsoAsked\Api\Exception\ListSearchesUnauthorizedException
     * @throws \AlsoAsked\Api\Exception\ListSearchesUnprocessableEntityException
     * @throws \AlsoAsked\Api\Exception\UnexpectedStatusCodeException
     *
     * @return \AlsoAsked\Api\Model\PaginatedSearchRequests
     */
    protected function transformResponseBody(
        \Psr\Http\Message\ResponseInterface $response,
        \Symfony\Component\Serializer\SerializerInterface $serializer,
        ?string $contentType = null,
    ) {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();

        if (\is_null($contentType) === false && ($status === 200 && \mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\PaginatedSearchRequests', 'json');
        }

        if (\is_null($contentType) === false && ($status === 401 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\ListSearchesUnauthorizedException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 402 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\ListSearchesPaymentRequiredException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 403 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\ListSearchesForbiddenException($response);
        }

        if (\is_null($contentType) === false && ($status === 422 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\ListSearchesUnprocessableEntityException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 429 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\ListSearchesTooManyRequestsException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 500 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\ListSearchesInternalServerErrorException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 503 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\ListSearchesServiceUnavailableException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        throw new \AlsoAsked\Api\Exception\UnexpectedStatusCodeException($status, $body);
    }

    public function getAuthenticationScopes(): array
    {
        return ['apiKey'];
    }
}
