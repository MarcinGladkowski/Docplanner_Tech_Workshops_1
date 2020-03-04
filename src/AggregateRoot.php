<?php

declare(strict_types=1);

namespace Bank;

use Bank\Event\Event;

class AggregateRoot
{
    private $events = [];

    protected function record(Event $event): void
    {
        $this->events[] = $event;
        $this->apply($event);
    }

    protected function apply(Event $event): void
    {
        $apply = 'apply' . (new \ReflectionClass($event))->getShortName();

        $this->$apply($event);
    }
}
