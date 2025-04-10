<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Model;

class SearchQuery extends \ArrayObject
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
     * The search term.
     *
     * @var string
     */
    protected $term;

    /**
     * Whether the search term was searched for in the specified language, or, if no results were returned, the search
     * term was searched for in the default language for the specified region.
     *
     * @var bool
     */
    protected $languageFallback;

    /**
     * Whether the search term was searched for in the specified region, or, if no results were returned, the search
     * term was searched for in the default region for the specified language.
     *
     * @var bool
     */
    protected $regionFallback;

    /**
     * The list of question and answers for the search term. The list will be empty if the search request has not
     * completed successfully.
     *
     * @var list<SearchResult>
     */
    protected $results;

    /**
     * The search term.
     *
     * @return string
     */
    public function getTerm(): string
    {
        return $this->term;
    }

    /**
     * The search term.
     *
     * @param string $term
     *
     * @return self
     */
    public function setTerm(string $term): self
    {
        $this->initialized['term'] = true;
        $this->term = $term;

        return $this;
    }

    /**
     * Whether the search term was searched for in the specified language, or, if no results were returned, the search
     * term was searched for in the default language for the specified region.
     *
     * @return bool
     */
    public function getLanguageFallback(): bool
    {
        return $this->languageFallback;
    }

    /**
     * Whether the search term was searched for in the specified language, or, if no results were returned, the search
     * term was searched for in the default language for the specified region.
     *
     * @param bool $languageFallback
     *
     * @return self
     */
    public function setLanguageFallback(bool $languageFallback): self
    {
        $this->initialized['languageFallback'] = true;
        $this->languageFallback = $languageFallback;

        return $this;
    }

    /**
     * Whether the search term was searched for in the specified region, or, if no results were returned, the search
     * term was searched for in the default region for the specified language.
     *
     * @return bool
     */
    public function getRegionFallback(): bool
    {
        return $this->regionFallback;
    }

    /**
     * Whether the search term was searched for in the specified region, or, if no results were returned, the search
     * term was searched for in the default region for the specified language.
     *
     * @param bool $regionFallback
     *
     * @return self
     */
    public function setRegionFallback(bool $regionFallback): self
    {
        $this->initialized['regionFallback'] = true;
        $this->regionFallback = $regionFallback;

        return $this;
    }

    /**
     * The list of question and answers for the search term. The list will be empty if the search request has not
     * completed successfully.
     *
     * @return list<SearchResult>
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * The list of question and answers for the search term. The list will be empty if the search request has not
     * completed successfully.
     *
     * @param list<SearchResult> $results
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
