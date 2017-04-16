<?php

class MegaSena
{

    protected $lottoResult;
    protected $bet;

    protected $costTable = [
        '6' => 2,
        '7' => 14,
        '8' => 56,
        '9' => 168,
        '10' => 420,
        '11' => 924,
        '12' => 1848,
        '13' => 3432,
        '14' => 6006,
        '15' => 10010
    ];

    protected $cost = 0;

    public function __construct (LottoSet $lottoResult, LottoSet $bet)
    {
        $this->lottoResult = $lottoResult;
        $this->bet = $bet;
    }

    public function placeBets(...$numbers)
    {
        $actualNumbers = is_array($numbers[0]) ? $numbers[0]: $numbers;

        $this->validateBet($actualNumbers);

        $this->bet->setSet($actualNumbers);
    }

    public function validateBet ($bet)
    {
        if (count($bet) < 6) {
            die("Números mínimos para um jogo: 6.\nVocê forneceu: ". count($bet) . ".\n");
        }
    }

    public function drawNumbers()
    {
        return $this->lottoResult->drawResult();
    }

    public function clearDraw ()
    {
        $this->lottoResult->clear();
    }

    public function evaluateBet ()
    {
        $rightNumbersCount = 0;

        foreach ($this->bet->resultSet() as $number) {
            if (in_array($number, $this->lottoResult->resultSet())) {
                $rightNumbersCount++;
            }
        }

        $this->addCost();

        return $rightNumbersCount > 5;
    }

    public function lottoResult ()
    {
        return $this->lottoResult;
    }

    public function bet ()
    {
        return $this->bet;
    }

    private function addCost()
    {

        $betCount = $this->bet->count();

        if ($betCount < 6 && $betCount > 15) {
            throw new InvalidArgumentException;
        }

        $this->cost += $this->costTable[$betCount];
    }

    public function getCost ()
    {
        return 'R$ ' . number_format($this->cost, 2, ',', '.');
    }
}

