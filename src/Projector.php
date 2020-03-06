<?php

declare(strict_types=1);

namespace Bank;

class Projector
{
    public function project($reconstitute): void
    {
        rsort($reconstitute);

        echo "Kwota || Saldo".PHP_EOL;
        foreach ($reconstitute as $row) {
            echo $row[0] . ' ' . $row[1] . PHP_EOL;
        }
    }

}
