<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Endpoint;

class PerformSearch extends \AlsoAsked\Api\Runtime\Client\BaseEndpoint implements \AlsoAsked\Api\Runtime\Client\Endpoint
{
    /**
     * Perform a search request.
     *
     * The search request is performed either synchronously, meaning the request hangs until the
     * search has completed, or asynchronously, meaning the request returns immediately, which is determined by the `async`
     * request parameter.
     *
     * If the search request completes successfully, as determined by the `status` property, the search
     * results are returned in the response body.
     *
     * Synchronous requests wait for a maximum of 90 seconds for the search to
     * complete, until which point the response is returned as if it was an asynchronous request.
     *
     * @param \AlsoAsked\Api\Model\SearchRequestOptions $requestBody
     */
    public function __construct(\AlsoAsked\Api\Model\SearchRequestOptions $requestBody)
    {
        $this->body = $requestBody;
    }

    use \AlsoAsked\Api\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/search';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \AlsoAsked\Api\Model\SearchRequestOptions) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @inheritDoc
     *
     * @throws \AlsoAsked\Api\Exception\PerformSearchBadRequestException
     * @throws \AlsoAsked\Api\Exception\PerformSearchForbiddenException
     * @throws \AlsoAsked\Api\Exception\PerformSearchInternalServerErrorException
     * @throws \AlsoAsked\Api\Exception\PerformSearchPaymentRequiredException
     * @throws \AlsoAsked\Api\Exception\PerformSearchServiceUnavailableException
     * @throws \AlsoAsked\Api\Exception\PerformSearchTooManyRequestsException
     * @throws \AlsoAsked\Api\Exception\PerformSearchUnauthorizedException
     * @throws \AlsoAsked\Api\Exception\PerformSearchUnprocessableEntityException
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

        if (\is_null($contentType) === false && ($status === 400 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\PerformSearchBadRequestException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 401 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\PerformSearchUnauthorizedException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 402 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\PerformSearchPaymentRequiredException($response);
        }

        if (\is_null($contentType) === false && ($status === 403 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\PerformSearchForbiddenException($response);
        }

        if (\is_null($contentType) === false && ($status === 422 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\PerformSearchUnprocessableEntityException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 429 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\PerformSearchTooManyRequestsException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 500 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\PerformSearchInternalServerErrorException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 503 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\PerformSearchServiceUnavailableException($serializer->deserialize($body, 'AlsoAsked\Api\Model\Error', 'json'), $response);
        }

        throw new \AlsoAsked\Api\Exception\UnexpectedStatusCodeException($status, $body);
    }

    public function getAuthenticationScopes(): array
    {
        return ['apiKey'];
    }
}
