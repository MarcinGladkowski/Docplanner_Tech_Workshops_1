<?php

namespace Tests\Bank\View;

use Bank\View\EventView;
use PHPUnit\Framework\TestCase;

class EventViewTest extends TestCase
{
    public function testShouldCreateEventViewTest(): void
    {
        self::assertInstanceOf(EventView::class, new EventView(0,0));
    }

    public function testShouldReturnBalance(): void
    {
        self::assertEquals(200, (new EventView(0,200))->getBalance());
    }

    public function testShouldReturnAmount(): void
    {
        self::assertEquals(200, (new EventView(200,0))->getAmount());
    }
}
