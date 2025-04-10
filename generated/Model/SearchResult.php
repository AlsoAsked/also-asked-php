<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Model;

class SearchResult extends \ArrayObject
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
     * The question.
     *
     * @var string
     */
    protected $question;

    /**
     * The excerpt of the answer.
     *
     * @var string
     */
    protected $answerExcerpt;

    /**
     * The URL containing the answer.
     *
     * @var string
     */
    protected $answerHref;

    /**
     * The title of the page containing the answer.
     *
     * @var string
     */
    protected $answerPageTitle;

    /**
     * The list of child search results related to the search result's question.
     *
     * @var list<self>
     */
    protected $results;

    /**
     * The question.
     *
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * The question.
     *
     * @param string $question
     *
     * @return self
     */
    public function setQuestion(string $question): self
    {
        $this->initialized['question'] = true;
        $this->question = $question;

        return $this;
    }

    /**
     * The excerpt of the answer.
     *
     * @return string
     */
    public function getAnswerExcerpt(): string
    {
        return $this->answerExcerpt;
    }

    /**
     * The excerpt of the answer.
     *
     * @param string $answerExcerpt
     *
     * @return self
     */
    public function setAnswerExcerpt(string $answerExcerpt): self
    {
        $this->initialized['answerExcerpt'] = true;
        $this->answerExcerpt = $answerExcerpt;

        return $this;
    }

    /**
     * The URL containing the answer.
     *
     * @return string
     */
    public function getAnswerHref(): string
    {
        return $this->answerHref;
    }

    /**
     * The URL containing the answer.
     *
     * @param string $answerHref
     *
     * @return self
     */
    public function setAnswerHref(string $answerHref): self
    {
        $this->initialized['answerHref'] = true;
        $this->answerHref = $answerHref;

        return $this;
    }

    /**
     * The title of the page containing the answer.
     *
     * @return string
     */
    public function getAnswerPageTitle(): string
    {
        return $this->answerPageTitle;
    }

    /**
     * The title of the page containing the answer.
     *
     * @param string $answerPageTitle
     *
     * @return self
     */
    public function setAnswerPageTitle(string $answerPageTitle): self
    {
        $this->initialized['answerPageTitle'] = true;
        $this->answerPageTitle = $answerPageTitle;

        return $this;
    }

    /**
     * The list of child search results related to the search result's question.
     *
     * @return list<self>
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * The list of child search results related to the search result's question.
     *
     * @param list<self> $results
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
