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
