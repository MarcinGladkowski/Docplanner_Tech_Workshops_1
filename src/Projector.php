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

        echo '|| '.str_pad('Kwota',5,' ') . ' || ' . str_pad('Saldo', 5, ' ') . PHP_EOL;
        foreach ($reconstitute as $event) {
            echo '|| '.str_pad((string) $event->getAmount(),5,' ') . ' || ' . str_pad((string) $event->getBalance(), 5, ' ') . PHP_EOL;
        }
    }

}
