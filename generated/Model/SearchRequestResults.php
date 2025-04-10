<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Model;

class SearchRequestResults extends \ArrayObject
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
     * The unique identifier for the search request.
     *
     * @var string
     */
    protected $id;

    /**
     * The search queries that were performed as part of the request. If the search request was deleted, this value will
     * be null.
     *
     * @var list<SearchQuery>|null
     */
    protected $queries;

    /**
     * The language code used when performing a search. The language code is a two-letter ISO 639-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @var string|null
     */
    protected $language;

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @var string|null
     */
    protected $region;

    /**
     * The latitude used when performing a search. If the search request was deleted, this value will be null.
     *
     * @var float|null
     */
    protected $latitude;

    /**
     * The longitude used when performing a search. If the search request was deleted, this value will be null.
     *
     * @var float|null
     */
    protected $longitude;

    /**
     * The status of the search request. If the search request was deleted, this value will be null.
     *
     * @var string|null
     */
    protected $status;

    /**
     * Whether the search request has been deleted.
     *
     * @var bool
     */
    protected $deleted;

    /**
     * The depth of the search request. If the search request was deleted, this value will be null.
     *
     * @var int|null
     */
    protected $depth;

    /**
     * Whether the search request was fetched from the cache. This can be overridden using the `fresh` parameter when
     * performing a search. If the search request was deleted, this value will be null.
     *
     * @var bool|null
     */
    protected $cached;

    /**
     * The date and time at which the search request was created.
     *
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * The date and time at which the search request was last updated.
     *
     * @var \DateTimeInterface
     */
    protected $updatedAt;

    /**
     * The date and time at which the search request was cached at. If the search request wasn't fetched from the cache,
     * or the request has been deleted, this value will be null.
     *
     * @var \DateTimeInterface|null
     */
    protected $cachedAt;

    /**
     * The unique identifier for the search request.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The unique identifier for the search request.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The search queries that were performed as part of the request. If the search request was deleted, this value will
     * be null.
     *
     * @return list<SearchQuery>|null
     */
    public function getQueries(): ?array
    {
        return $this->queries;
    }

    /**
     * The search queries that were performed as part of the request. If the search request was deleted, this value will
     * be null.
     *
     * @param list<SearchQuery>|null $queries
     *
     * @return self
     */
    public function setQueries(?array $queries): self
    {
        $this->initialized['queries'] = true;
        $this->queries = $queries;

        return $this;
    }

    /**
     * The language code used when performing a search. The language code is a two-letter ISO 639-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * The language code used when performing a search. The language code is a two-letter ISO 639-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;

        return $this;
    }

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @param string|null $region
     *
     * @return self
     */
    public function setRegion(?string $region): self
    {
        $this->initialized['region'] = true;
        $this->region = $region;

        return $this;
    }

    /**
     * The latitude used when performing a search. If the search request was deleted, this value will be null.
     *
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * The latitude used when performing a search. If the search request was deleted, this value will be null.
     *
     * @param float|null $latitude
     *
     * @return self
     */
    public function setLatitude(?float $latitude): self
    {
        $this->initialized['latitude'] = true;
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * The longitude used when performing a search. If the search request was deleted, this value will be null.
     *
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * The longitude used when performing a search. If the search request was deleted, this value will be null.
     *
     * @param float|null $longitude
     *
     * @return self
     */
    public function setLongitude(?float $longitude): self
    {
        $this->initialized['longitude'] = true;
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * The status of the search request. If the search request was deleted, this value will be null.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * The status of the search request. If the search request was deleted, this value will be null.
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Whether the search request has been deleted.
     *
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * Whether the search request has been deleted.
     *
     * @param bool $deleted
     *
     * @return self
     */
    public function setDeleted(bool $deleted): self
    {
        $this->initialized['deleted'] = true;
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * The depth of the search request. If the search request was deleted, this value will be null.
     *
     * @return int|null
     */
    public function getDepth(): ?int
    {
        return $this->depth;
    }

    /**
     * The depth of the search request. If the search request was deleted, this value will be null.
     *
     * @param int|null $depth
     *
     * @return self
     */
    public function setDepth(?int $depth): self
    {
        $this->initialized['depth'] = true;
        $this->depth = $depth;

        return $this;
    }

    /**
     * Whether the search request was fetched from the cache. This can be overridden using the `fresh` parameter when
     * performing a search. If the search request was deleted, this value will be null.
     *
     * @return bool|null
     */
    public function getCached(): ?bool
    {
        return $this->cached;
    }

    /**
     * Whether the search request was fetched from the cache. This can be overridden using the `fresh` parameter when
     * performing a search. If the search request was deleted, this value will be null.
     *
     * @param bool|null $cached
     *
     * @return self
     */
    public function setCached(?bool $cached): self
    {
        $this->initialized['cached'] = true;
        $this->cached = $cached;

        return $this;
    }

    /**
     * The date and time at which the search request was created.
     *
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * The date and time at which the search request was created.
     *
     * @param \DateTimeInterface $createdAt
     *
     * @return self
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * The date and time at which the search request was last updated.
     *
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * The date and time at which the search request was last updated.
     *
     * @param \DateTimeInterface $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * The date and time at which the search request was cached at. If the search request wasn't fetched from the cache,
     * or the request has been deleted, this value will be null.
     *
     * @return \DateTimeInterface|null
     */
    public function getCachedAt(): ?\DateTimeInterface
    {
        return $this->cachedAt;
    }

    /**
     * The date and time at which the search request was cached at. If the search request wasn't fetched from the cache,
     * or the request has been deleted, this value will be null.
     *
     * @param \DateTimeInterface|null $cachedAt
     *
     * @return self
     */
    public function setCachedAt(?\DateTimeInterface $cachedAt): self
    {
        $this->initialized['cachedAt'] = true;
        $this->cachedAt = $cachedAt;

        return $this;
    }
}
