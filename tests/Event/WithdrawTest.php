<?php

declare(strict_types=1);

namespace Tests\Bank\Event;

use Bank\Event\Event;
use Bank\Event\Withdraw;
use PHPUnit\Framework\TestCase;

class WithdrawTest extends TestCase
{
    public function testShouldCreateNewDepositEvent(): void
    {
        self::assertInstanceOf(Withdraw::class, new Withdraw(200));
        self::assertInstanceOf(Event::class, new Withdraw(200));
    }

    public function testShouldReturnCorrectAmount(): void
    {
        self::assertEquals(200,(new Withdraw(200))->getAmount());
    }

    public function testShouldThrowExceptionWhenTryDepositNegativeAmount(): void
    {
        self::expectException(\InvalidArgumentException::class);

        new Withdraw(-200);
    }
}
