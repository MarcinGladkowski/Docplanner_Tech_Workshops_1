<?php

namespace Tests\Bank\Event;

use Bank\Event\Deposit;
use Bank\Event\Event;
use PHPUnit\Framework\TestCase;

class DepositEventTest extends TestCase
{
    public function testShouldCreateNewDepositEvent(): void
    {
        self::assertInstanceOf(Deposit::class, new Deposit(200));
        self::assertInstanceOf(Event::class, new Deposit(200));
    }

    public function testShouldReturnCorrectAmount(): void
    {
        self::assertEquals(200,(new Deposit(200))->getAmount());
    }
}
