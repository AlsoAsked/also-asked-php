<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Model;

class SearchRequest extends \ArrayObject
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
     * The terms searched for. If the search request was deleted, this value will be null.
     *
     * @var mixed
     */
    protected $terms;

    /**
     * The language code used when performing a search. The language code is a two-letter ISO 639-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @var mixed
     */
    protected $language;

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @var mixed
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
     * @var mixed
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
     * @var mixed
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
     * @var mixed
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
     * The terms searched for. If the search request was deleted, this value will be null.
     *
     * @return mixed
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * The terms searched for. If the search request was deleted, this value will be null.
     *
     * @param mixed $terms
     *
     * @return self
     */
    public function setTerms($terms): self
    {
        $this->initialized['terms'] = true;
        $this->terms = $terms;

        return $this;
    }

    /**
     * The language code used when performing a search. The language code is a two-letter ISO 639-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * The language code used when performing a search. The language code is a two-letter ISO 639-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @param mixed $language
     *
     * @return self
     */
    public function setLanguage($language): self
    {
        $this->initialized['language'] = true;
        $this->language = $language;

        return $this;
    }

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * The region code used when performing a search. The region code is a two-letter ISO 3166-1 code. If the search
     * request was deleted, this value will be null.
     *
     * @param mixed $region
     *
     * @return self
     */
    public function setRegion($region): self
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
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * The status of the search request. If the search request was deleted, this value will be null.
     *
     * @param mixed $status
     *
     * @return self
     */
    public function setStatus($status): self
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
     * @return mixed
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * The depth of the search request. If the search request was deleted, this value will be null.
     *
     * @param mixed $depth
     *
     * @return self
     */
    public function setDepth($depth): self
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
     * @return mixed
     */
    public function getCachedAt()
    {
        return $this->cachedAt;
    }

    /**
     * The date and time at which the search request was cached at. If the search request wasn't fetched from the cache,
     * or the request has been deleted, this value will be null.
     *
     * @param mixed $cachedAt
     *
     * @return self
     */
    public function setCachedAt($cachedAt): self
    {
        $this->initialized['cachedAt'] = true;
        $this->cachedAt = $cachedAt;

        return $this;
    }
}
