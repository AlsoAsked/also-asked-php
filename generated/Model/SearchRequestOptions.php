<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Model;

class SearchRequestOptions extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The terms to search for.
     *
     * @var list<string>
     */
    protected $terms;

    /**
     * The language to use when searching for the terms.
     *
     * @var string
     */
    protected $language = 'en';

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code.
     *
     * @var string
     */
    protected $region = 'us';

    /**
     * The depth of the search determines the number of hierarchical levels of questions returned in the results.
     * A greater depth value retrieves questions nested within additional layers of subquestions. Be aware that
     * increasing the depth will increase the number of credits consumed. A search depth of 2 will consume 1 credit,
     * whereas a depth of 3 will consume 4 credits.
     *
     * @var int
     */
    protected $depth = 2;

    /**
     * The fresh flag determines whether the search results are retrieved from the cache or live from the search engine.
     *
     * @var bool
     */
    protected $fresh = false;

    /**
     * The async flag determines whether to run the search in a blocking (synchronous) or non-blocking (asynchronous)
     * manner. When a search request is performed asynchronously, the webhooks configured for the account will be
     * notified when the status of a search changes. When a search is synchronous, the search results are returned in
     * the response body when the search is complete.
     *
     * @var bool
     */
    protected $async = false;

    /**
     * The notify webhooks flag determines whether to notify webhooks when the status of a search changes. Webhooks are
     * notified regardless of whether the search is performed synchronously or asynchronously. Use this flag to disable
     * webhook notifications for synchronous searches which do not require webhook notifications.
     *
     * @var bool
     */
    protected $notifyWebhooks = true;

    /**
     * The latitude of the location to perform the search in.
     *
     * @var float
     */
    protected $latitude;

    /**
     * The longitude of the location to perform the search in.
     *
     * @var float
     */
    protected $longitude;

    /**
     * The terms to search for.
     *
     * @return list<string>
     */
    public function getTerms(): array
    {
        return $this->terms;
    }

    /**
     * The terms to search for.
     *
     * @param list<string> $terms
     *
     * @return self
     */
    public function setTerms(array $terms): self
    {
        $this->initialized['terms'] = true;
        $this->terms = $terms;

        return $this;
    }

    /**
     * The language to use when searching for the terms.
     *
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * The language to use when searching for the terms.
     *
     * @param string $language
     *
     * @return self
     */
    public function setLanguage(string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;

        return $this;
    }

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code.
     *
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code.
     *
     * @param string $region
     *
     * @return self
     */
    public function setRegion(string $region): self
    {
        $this->initialized['region'] = true;
        $this->region = $region;

        return $this;
    }

    /**
     * The depth of the search determines the number of hierarchical levels of questions returned in the results.
     * A greater depth value retrieves questions nested within additional layers of subquestions. Be aware that
     * increasing the depth will increase the number of credits consumed. A search depth of 2 will consume 1 credit,
     * whereas a depth of 3 will consume 4 credits.
     *
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * The depth of the search determines the number of hierarchical levels of questions returned in the results.
     * A greater depth value retrieves questions nested within additional layers of subquestions. Be aware that
     * increasing the depth will increase the number of credits consumed. A search depth of 2 will consume 1 credit,
     * whereas a depth of 3 will consume 4 credits.
     *
     * @param int $depth
     *
     * @return self
     */
    public function setDepth(int $depth): self
    {
        $this->initialized['depth'] = true;
        $this->depth = $depth;

        return $this;
    }

    /**
     * The fresh flag determines whether the search results are retrieved from the cache or live from the search engine.
     *
     * @return bool
     */
    public function getFresh(): bool
    {
        return $this->fresh;
    }

    /**
     * The fresh flag determines whether the search results are retrieved from the cache or live from the search engine.
     *
     * @param bool $fresh
     *
     * @return self
     */
    public function setFresh(bool $fresh): self
    {
        $this->initialized['fresh'] = true;
        $this->fresh = $fresh;

        return $this;
    }

    /**
     * The async flag determines whether to run the search in a blocking (synchronous) or non-blocking (asynchronous)
     * manner. When a search request is performed asynchronously, the webhooks configured for the account will be
     * notified when the status of a search changes. When a search is synchronous, the search results are returned in
     * the response body when the search is complete.
     *
     * @return bool
     */
    public function getAsync(): bool
    {
        return $this->async;
    }

    /**
     * The async flag determines whether to run the search in a blocking (synchronous) or non-blocking (asynchronous)
     * manner. When a search request is performed asynchronously, the webhooks configured for the account will be
     * notified when the status of a search changes. When a search is synchronous, the search results are returned in
     * the response body when the search is complete.
     *
     * @param bool $async
     *
     * @return self
     */
    public function setAsync(bool $async): self
    {
        $this->initialized['async'] = true;
        $this->async = $async;

        return $this;
    }

    /**
     * The notify webhooks flag determines whether to notify webhooks when the status of a search changes. Webhooks are
     * notified regardless of whether the search is performed synchronously or asynchronously. Use this flag to disable
     * webhook notifications for synchronous searches which do not require webhook notifications.
     *
     * @return bool
     */
    public function getNotifyWebhooks(): bool
    {
        return $this->notifyWebhooks;
    }

    /**
     * The notify webhooks flag determines whether to notify webhooks when the status of a search changes. Webhooks are
     * notified regardless of whether the search is performed synchronously or asynchronously. Use this flag to disable
     * webhook notifications for synchronous searches which do not require webhook notifications.
     *
     * @param bool $notifyWebhooks
     *
     * @return self
     */
    public function setNotifyWebhooks(bool $notifyWebhooks): self
    {
        $this->initialized['notifyWebhooks'] = true;
        $this->notifyWebhooks = $notifyWebhooks;

        return $this;
    }

    /**
     * The latitude of the location to perform the search in.
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * The latitude of the location to perform the search in.
     *
     * @param float $latitude
     *
     * @return self
     */
    public function setLatitude(float $latitude): self
    {
        $this->initialized['latitude'] = true;
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * The longitude of the location to perform the search in.
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * The longitude of the location to perform the search in.
     *
     * @param float $longitude
     *
     * @return self
     */
    public function setLongitude(float $longitude): self
    {
        $this->initialized['longitude'] = true;
        $this->longitude = $longitude;

        return $this;
    }
}
