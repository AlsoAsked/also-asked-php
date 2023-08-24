<?php

declare(strict_types=1);

namespace AlsoAsked\Api;

class Client extends \AlsoAsked\Api\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \AlsoAsked\Api\Exception\GetAccountForbiddenException
     * @throws \AlsoAsked\Api\Exception\GetAccountInternalServerErrorException
     * @throws \AlsoAsked\Api\Exception\GetAccountPaymentRequiredException
     * @throws \AlsoAsked\Api\Exception\GetAccountServiceUnavailableException
     * @throws \AlsoAsked\Api\Exception\GetAccountTooManyRequestsException
     * @throws \AlsoAsked\Api\Exception\GetAccountUnauthorizedException
     * @throws \AlsoAsked\Api\Exception\UnexpectedStatusCodeException
     *
     * @return \AlsoAsked\Api\Model\Account|\Psr\Http\Message\ResponseInterface
     */
    public function getAccount(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \AlsoAsked\Api\Endpoint\GetAccount(), $fetch);
    }

    /**
     * Get a paginated list of searches performed by the current user, sorted by the date they were created, with the most
     * recent searches appearing first.
     *
     * @param array $queryParameters {
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @var int $count the number of results to return
     * @var int $page The page of results to return.
     *
     * }
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
     * @return \AlsoAsked\Api\Model\PaginatedSearchRequests|\Psr\Http\Message\ResponseInterface
     */
    public function listSearches(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \AlsoAsked\Api\Endpoint\ListSearches($queryParameters), $fetch);
    }

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
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
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
     * @return \AlsoAsked\Api\Model\SearchRequestResults|\Psr\Http\Message\ResponseInterface
     */
    public function performSearch(
        Model\SearchRequestOptions $requestBody,
        string $fetch = self::FETCH_OBJECT,
    ) {
        return $this->executeEndpoint(new \AlsoAsked\Api\Endpoint\PerformSearch($requestBody), $fetch);
    }

    /**
     * Delete a search request. The search results will be deleted from the cache and the search result's term masked in the
     * search history.
     *
     * @param string $searchId the ID of the search request
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
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
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function deleteSearch(string $searchId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \AlsoAsked\Api\Endpoint\DeleteSearch($searchId), $fetch);
    }

    /**
     * Get the details of a search request, and if the search request has completed successfully, obtain the search results.
     *
     * @param string $searchId the ID of the search request
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
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
     * @return \AlsoAsked\Api\Model\SearchRequestResults|\Psr\Http\Message\ResponseInterface
     */
    public function getSearch(string $searchId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \AlsoAsked\Api\Endpoint\GetSearch($searchId), $fetch);
    }

    public static function create(
        $httpClient = null,
        array $additionalPlugins = [],
        array $additionalNormalizers = [],
    ) {
        if ($httpClient === null) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://alsoaskedapi.com/v1');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);

            if (\count($additionalPlugins) > 0) {
                $plugins = \array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \AlsoAsked\Api\Normalizer\JaneObjectNormalizer()];

        if (\count($additionalNormalizers) > 0) {
            $normalizers = \array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
