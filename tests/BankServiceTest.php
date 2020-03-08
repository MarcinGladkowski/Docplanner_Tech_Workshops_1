<?php
declare(strict_types=1);

namespace Tests\Bank;

use Bank\Bank;
use Bank\Projector;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class BankServiceTest extends TestCase
{
    /**
     * @var Bank
     */
    private $bank;

    protected function setUp()
    {
        $this->bank = new Bank(new Projector());
    }

    public function testShouldAddAmountToDeposit(): void
    {
        $this->bank->deposit(200);

        self::assertEquals(200, $this->bank->getBalance());
    }

    public function testShouldAddTwoTimesAmountToDeposit(): void
    {
        $this->bank->deposit(200);
        $this->bank->deposit(400);

        self::assertEquals(600, $this->bank->getBalance());
    }

    public function testShouldDepositAmountAndWithdrawTheSameAmount(): void
    {
        $this->bank->deposit(200);
        $this->bank->withdraw(200);

        self::assertEquals(0, $this->bank->getBalance());
    }

    public function testShouldThrowAnRuntimeExceptionWhenWithdrawMoreMoneyThanInAccount(): void
    {
        self::expectException(\RuntimeException::class);

        $this->bank->deposit(200);
        $this->bank->withdraw(400);
    }

    public function testShouldRunProjectMethod(): void
    {
        /** @var Projector|MockObject $projector */
        $projector = $this->createMock(Projector::class);
        $projector->expects(self::once())->method('project');

        $bank = new Bank($projector);
        $bank->deposit(100);
        $bank->deposit(200);
        $bank->withdraw(300);

        $bank->printStatement();
    }

    public function testShouldDisplayEventsOnTerminal(): void
    {
        $bank = new Bank(new Projector());
        $bank->deposit(100);
        $bank->deposit(200);
        $bank->withdraw(300);

        $bank->printStatement();

        $this->expectOutputString("Data      || Kwota || Saldo
08/03/2020 || 300   || 0    
08/03/2020 || 200   || 300  
08/03/2020 || 100   || 100  
08/03/2020 || 0     || 0    
");
    }

}
