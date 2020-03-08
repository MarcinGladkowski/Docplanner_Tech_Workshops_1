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
        \rsort($reconstitute);

        $this->printLineToTerminal('Data', 'Kwota', 'Saldo');

        foreach ($reconstitute as $event) {
            $this->printLineToTerminal(
                $event->getDateTime()->format('d/m/Y'),
                (string)$event->getAmount(),
                (string)$event->getBalance()
            );
        }
    }

    private function printLineToTerminal(string $date, string $amount, string $balance): void
    {
        echo \str_pad($date, 9, ' ') . ' || ' . \str_pad($amount, 5, ' ') . ' || ' . \str_pad($balance, 5, ' ') . \PHP_EOL;
    }
}
