<?php

declare(strict_types=1);

namespace Bank;

use Bank\Event\Deposit;
use Bank\Event\Event;
use Bank\Event\Withdraw;
use Bank\View\EventView;

class Bank extends AggregateRoot implements BankService
{
    protected $balance;

    /** @var Projector */
    private $projector;

    public function __construct(Projector $projector)
    {
        $this->balance = 0; // add as event
        $this->projector = $projector;
    }

    public function deposit(int $amount): void
    {
        $this->record(new Deposit($amount));
    }

    public function withdraw(int $amount): void
    {
        $this->record(new Withdraw($amount));
    }

    public function printStatement(): void
    {
        $aggregate = new self(new Projector());
        $events = $this->events;

        $reconstitute = array_map(static function(Event $event) use ($aggregate) {
            $aggregate->record($event);
            return new EventView($event->getAmount(), $aggregate->getBalance());
        }, $events);

        $this->projector->project($reconstitute);
    }

    protected function applyDeposit(Deposit $event)
    {
        $this->balance += $event->getAmount();
    }

    protected function applyWithdraw(Withdraw $event)
    {
        if ($event->getAmount() > $this->balance) {
            throw new \RuntimeException("Can't withdraw more many than an is in balance");
        }

        $this->balance -= $event->getAmount();
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }
}
