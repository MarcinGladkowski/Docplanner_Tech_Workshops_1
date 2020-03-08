<?php

namespace Tests\Bank\Event;

use Bank\Event\Deposit;
use Bank\Event\Event;
use PHPUnit\Framework\TestCase;

class DepositTest extends TestCase
{
    public function testShouldCreateNewDepositEvent(): void
    {
        self::assertInstanceOf(Deposit::class, new Deposit(200, new \DateTime()));
        self::assertInstanceOf(Event::class, new Deposit(200, new \DateTime()));
    }

    public function testShouldReturnCorrectAmount(): void
    {
        self::assertEquals(200,(new Deposit(200, new \DateTime()))->getAmount());
    }

    public function testShouldThrowExceptionWhenTryDepositNegativeAmount(): void
    {
        self::expectException(\InvalidArgumentException::class);

        new Deposit(-200, new \DateTime());
    }
}
