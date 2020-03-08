<?php declare(strict_types=1);

namespace Bank\View;

class EventView
{
    /**
     * @var int
     */
    private $amount;
    /**
     * @var int
     */
    private $balance;

    public function __construct(int $amount, int $balance)
    {
        $this->amount = $amount;
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}
