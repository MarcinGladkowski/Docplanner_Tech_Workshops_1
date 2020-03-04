<?php

declare(strict_types=1);

namespace Bank;

class Projector
{
    public function project($reconstitute): void
    {
        rsort($reconstitute);

        foreach ($reconstitute as $row) {
            echo $row;
        }
    }

}
