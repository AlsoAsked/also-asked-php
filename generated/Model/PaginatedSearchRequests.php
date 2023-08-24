<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Model;

class PaginatedSearchRequests extends \ArrayObject
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
     * The total number of search requests.
     *
     * @var int
     */
    protected $total;

    /**
     * The page of search requests which was returned.
     *
     * @var int
     */
    protected $page;

    /**
     * The list of search requests.
     *
     * @var array<SearchRequest>
     */
    protected $results;

    /**
     * The total number of search requests.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * The total number of search requests.
     *
     * @param int $total
     *
     * @return self
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;

        return $this;
    }

    /**
     * The page of search requests which was returned.
     *
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * The page of search requests which was returned.
     *
     * @param int $page
     *
     * @return self
     */
    public function setPage(int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

        return $this;
    }

    /**
     * The list of search requests.
     *
     * @return array<SearchRequest>
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * The list of search requests.
     *
     * @param array<SearchRequest> $results
     *
     * @return self
     */
    public function setResults(array $results): self
    {
        $this->initialized['results'] = true;
        $this->results = $results;

        return $this;
    }
}
