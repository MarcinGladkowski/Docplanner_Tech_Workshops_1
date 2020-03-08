<?php

declare(strict_types=1);

namespace Bank\Event;

final class Deposit implements Event
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var \DateTime
     */
    private $dateTime;

    public function __construct(int $amount, \DateTime $dateTime)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Can't deposit negative amount");
        }

        $this->amount = $amount;
        $this->dateTime = $dateTime;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }
}
