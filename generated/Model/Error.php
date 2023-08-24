<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Model;

class Error extends \ArrayObject
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
     * The error status is an identifier for the type of error that occurred.
     *
     * @var string
     */
    protected $status;

    /**
     * A human-readable message describing the error. This message is intended to be read by a developer and is
     * not suitable for display to an end user.
     *
     * @var string
     */
    protected $message;

    /**
     * The error status is an identifier for the type of error that occurred.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * The error status is an identifier for the type of error that occurred.
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * A human-readable message describing the error. This message is intended to be read by a developer and is
     * not suitable for display to an end user.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * A human-readable message describing the error. This message is intended to be read by a developer and is
     * not suitable for display to an end user.
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }
}
