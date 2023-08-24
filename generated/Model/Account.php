<?php

declare(strict_types=1);

namespace AlsoAsked\Api\Model;

class Account extends \ArrayObject
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
     * The unique identifier for the account.
     *
     * @var string
     */
    protected $id;

    /**
     * The human-readable name for the account.
     *
     * @var string
     */
    protected $name;

    /**
     * The email address associated with the account.
     *
     * @var string
     */
    protected $email;

    /**
     * The type of plan that the account, or the account's team owner, is subscribed to.
     *
     * @var string
     */
    protected $planType;

    /**
     * The number of credits remaining in the account.
     *
     * @var int
     */
    protected $credits;

    /**
     * The account credit reset date is the date and time at which the account credits will be reset to default.
     *
     * @var \DateTimeInterface
     */
    protected $creditsResetAt;

    /**
     * The account registration date is the date and time at which the account was registered.
     *
     * @var \DateTimeInterface
     */
    protected $registeredAt;

    /**
     * The unique identifier for the account.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The unique identifier for the account.
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
     * The human-readable name for the account.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The human-readable name for the account.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The email address associated with the account.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * The email address associated with the account.
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    /**
     * The type of plan that the account, or the account's team owner, is subscribed to.
     *
     * @return string
     */
    public function getPlanType(): string
    {
        return $this->planType;
    }

    /**
     * The type of plan that the account, or the account's team owner, is subscribed to.
     *
     * @param string $planType
     *
     * @return self
     */
    public function setPlanType(string $planType): self
    {
        $this->initialized['planType'] = true;
        $this->planType = $planType;

        return $this;
    }

    /**
     * The number of credits remaining in the account.
     *
     * @return int
     */
    public function getCredits(): int
    {
        return $this->credits;
    }

    /**
     * The number of credits remaining in the account.
     *
     * @param int $credits
     *
     * @return self
     */
    public function setCredits(int $credits): self
    {
        $this->initialized['credits'] = true;
        $this->credits = $credits;

        return $this;
    }

    /**
     * The account credit reset date is the date and time at which the account credits will be reset to default.
     *
     * @return \DateTimeInterface
     */
    public function getCreditsResetAt(): \DateTimeInterface
    {
        return $this->creditsResetAt;
    }

    /**
     * The account credit reset date is the date and time at which the account credits will be reset to default.
     *
     * @param \DateTimeInterface $creditsResetAt
     *
     * @return self
     */
    public function setCreditsResetAt(\DateTimeInterface $creditsResetAt): self
    {
        $this->initialized['creditsResetAt'] = true;
        $this->creditsResetAt = $creditsResetAt;

        return $this;
    }

    /**
     * The account registration date is the date and time at which the account was registered.
     *
     * @return \DateTimeInterface
     */
    public function getRegisteredAt(): \DateTimeInterface
    {
        return $this->registeredAt;
    }

    /**
     * The account registration date is the date and time at which the account was registered.
     *
     * @param \DateTimeInterface $registeredAt
     *
     * @return self
     */
    public function setRegisteredAt(\DateTimeInterface $registeredAt): self
    {
        $this->initialized['registeredAt'] = true;
        $this->registeredAt = $registeredAt;

        return $this;
    }
}
