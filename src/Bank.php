<?php

declare(strict_types=1);

namespace Bank;

use Bank\Event\CreateDeposit;
use Bank\Event\Deposit;
use Bank\Event\Event;
use Bank\Event\Withdraw;
use Bank\View\EventView;

final class Bank extends AggregateRoot implements BankService
{
    /** @var int */
    protected $balance;

    /** @var Projector */
    private $projector;

    public function __construct(Projector $projector)
    {
        $this->record(new CreateDeposit(0, new \DateTime()));
        $this->projector = $projector;
    }

    public function deposit(int $amount): void
    {
        $this->record(new Deposit($amount, new \DateTime()));
    }

    public function withdraw(int $amount): void
    {
        $this->record(new Withdraw($amount, new \DateTime()));
    }

    public function printStatement(): void
    {
        $aggregate = new self(new Projector());
        $events = $this->events;

        $reconstitute = \array_map(static function(Event $event) use ($aggregate) {
            $aggregate->record($event);

            return new EventView($event->getAmount(), $aggregate->getBalance());
        }, $events);

        $this->projector->project($reconstitute);
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    protected function applyCreateDeposit(CreateDeposit $event): void
    {
        $this->balance = $event->getAmount();
    }

    protected function applyDeposit(Deposit $event): void
    {
        $this->balance += $event->getAmount();
    }

    protected function applyWithdraw(Withdraw $event): void
    {
        if ($event->getAmount() > $this->balance) {
            throw new \RuntimeException("Can't withdraw more many than an is in balance");
        }

        $this->balance -= $event->getAmount();
    }
}
