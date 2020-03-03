<?php

namespace Tests\Bank\Event;

use Bank\Event\DepositEvent;
use Bank\Event\Event;
use PHPUnit\Framework\TestCase;

class DepositEventTest extends TestCase
{
    public function testShouldCreateNewDepositEvent(): void
    {
        self::assertInstanceOf(DepositEvent::class, new DepositEvent(200));
        self::assertInstanceOf(Event::class, new DepositEvent(200));
    }
}
