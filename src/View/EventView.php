<?php declare(strict_types=1);

namespace Bank\View;

final class EventView
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var int
     */
    private $balance;

    /**
     * @var \DateTime
     */
    private $dateTime;

    public function __construct(int $amount, int $balance, \DateTime $dateTime)
    {
        $this->amount = $amount;
        $this->balance = $balance;
        $this->dateTime = $dateTime;
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

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }
}
