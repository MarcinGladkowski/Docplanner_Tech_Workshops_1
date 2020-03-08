<?php

namespace Bank\Event;

class CreateDeposit implements Event
{
    /**
     * @var int
     */
    private $amount;

    public function __construct(int $amount = 0)
    {
        if ($amount < 0) {
            throw new \InvalidArgumentException("Can't create deposit with negative amount");
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
