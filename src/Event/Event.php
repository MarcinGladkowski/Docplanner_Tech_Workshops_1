<?php

declare(strict_types=1);

namespace Bank\Event;

interface Event
{
    public function getAmount(): int;

    public function getDateTime(): \DateTime;
}
