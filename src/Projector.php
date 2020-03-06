<?php

declare(strict_types=1);

namespace Bank;

use Bank\View\EventView;

class Projector
{
    /**
     * @param EventView[] $reconstitute
     */
    public function project(array $reconstitute): void
    {
        rsort($reconstitute);

        echo "Kwota || Saldo".PHP_EOL;
        foreach ($reconstitute as $event) {
            echo $event->getAmount() . ' ' . $event->getBalance() . PHP_EOL;
        }
    }

}
