<?php

declare(strict_types=1);

namespace Bank\Event;

class Withdraw implements Event
{
    /**
     * @var int
     */
    private $amount;

    public function __construct(int $amount)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Can't withdraw negative amount");
        }

        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}
