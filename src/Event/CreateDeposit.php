<?php declare(strict_types=1);

namespace Bank\Event;

final class CreateDeposit implements Event
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
        if ($amount < 0) {
            throw new \InvalidArgumentException("Can't create deposit with negative amount");
        }

        $this->amount = $amount ?? 0;
        $this->dateTime = $dateTime;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }
}
