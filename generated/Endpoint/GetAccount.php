<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Endpoint;

class GetAccount extends \AlsoAsked\Api\Runtime\Client\BaseEndpoint implements \AlsoAsked\Api\Runtime\Client\Endpoint
{
    use \AlsoAsked\Api\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/account';
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
     * @throws \AlsoAsked\Api\Exception\GetAccountForbiddenException
     * @throws \AlsoAsked\Api\Exception\GetAccountInternalServerErrorException
     * @throws \AlsoAsked\Api\Exception\GetAccountPaymentRequiredException
     * @throws \AlsoAsked\Api\Exception\GetAccountServiceUnavailableException
     * @throws \AlsoAsked\Api\Exception\GetAccountTooManyRequestsException
     * @throws \AlsoAsked\Api\Exception\GetAccountUnauthorizedException
     * @throws \AlsoAsked\Api\Exception\UnexpectedStatusCodeException
     *
     * @return \AlsoAsked\Api\Model\Account
     */
    protected function transformResponseBody(
        \Psr\Http\Message\ResponseInterface $response,
        \Symfony\Component\Serializer\SerializerInterface $serializer,
        ?string $contentType = null,
    ) {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();

        if (\is_null($contentType) === false && ($status === 200 && \mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Account', 'json');
        }

        if (\is_null($contentType) === false && ($status === 401 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetAccountUnauthorizedException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 402 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetAccountPaymentRequiredException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 403 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetAccountForbiddenException($response);
        }

        if (\is_null($contentType) === false && ($status === 429 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetAccountTooManyRequestsException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 500 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetAccountInternalServerErrorException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        if (\is_null($contentType) === false && ($status === 503 && \mb_strpos($contentType, 'application/json') !== false)) {
            throw new \AlsoAsked\Api\Exception\GetAccountServiceUnavailableException($serializer->deserialize($body, 'AlsoAsked\\Api\\Model\\Error', 'json'), $response);
        }

        throw new \AlsoAsked\Api\Exception\UnexpectedStatusCodeException($status, $body);
    }

    public function getAuthenticationScopes(): array
    {
        return ['apiKey'];
    }
}
