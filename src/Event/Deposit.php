<?php

declare(strict_types=1);

namespace Bank\Event;

class Deposit implements Event
{
    /**
     * @var int
     */
    private $amount;

    public function __construct(int $amount)
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Can't deposit negative amount");
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
