<?php

declare(strict_types=1);

namespace Bank;

use Bank\Event\Deposit;
use Bank\Event\Withdraw;
use http\Exception\RuntimeException;

class Bank extends AggregateRoot implements BankService
{
    private $balance;

    public function __construct()
    {
        $this->balance = 0; // add as event
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
        // TODO: Implement printStatement() method.
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
