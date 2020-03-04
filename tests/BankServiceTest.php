<?php
declare(strict_types=1);

namespace Tests\Bank;

use Bank\Bank;
use PHPUnit\Framework\TestCase;

final class BankServiceTest extends TestCase
{
    public function testShouldAddAmountToDeposit(): void
    {
        $bank = new Bank();
        $bank->deposit(200);

        self::assertEquals(200, $bank->getBalance());
    }

    public function testShouldAddTwoTimesAmountToDeposit(): void
    {
        $bank = new Bank();
        $bank->deposit(200);
        $bank->deposit(400);

        self::assertEquals(600, $bank->getBalance());
    }

    public function testShouldDepositAmountAndWithdrawTheSameAmount(): void
    {
        $bank = new Bank();
        $bank->deposit(200);
        $bank->withdraw(200);

        self::assertEquals(0, $bank->getBalance());
    }
}
