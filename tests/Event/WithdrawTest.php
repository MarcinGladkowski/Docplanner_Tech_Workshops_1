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
        self::assertInstanceOf(Withdraw::class, new Withdraw(200, new \DateTime()));
        self::assertInstanceOf(Event::class, new Withdraw(200, new \DateTime()));
    }

    public function testShouldReturnCorrectAmount(): void
    {
        self::assertEquals(200,(new Withdraw(200, new \DateTime()))->getAmount());
    }

    public function testShouldThrowExceptionWhenTryDepositNegativeAmount(): void
    {
        self::expectException(\InvalidArgumentException::class);

        new Withdraw(-200, new \DateTime());
    }
}
