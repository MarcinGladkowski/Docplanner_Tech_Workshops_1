<?php

namespace Tests\Bank\View;

use Bank\View\EventView;
use Nette\Utils\DateTime;
use PHPUnit\Framework\TestCase;

class EventViewTest extends TestCase
{
    public function testShouldCreateEventViewTest(): void
    {
        self::assertInstanceOf(EventView::class, new EventView(0,0, new \DateTime()));
    }

    public function testShouldReturnBalance(): void
    {
        self::assertEquals(200, (new EventView(0,200, new \DateTime()))->getBalance());
    }

    public function testShouldReturnAmount(): void
    {
        self::assertEquals(200, (new EventView(200,0, new \DateTime()))->getAmount());
    }
}
