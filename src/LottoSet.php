<?php

class LottoSet
{

    protected $resultSet = [];

    public function resultSet ()
    {
        return $this->resultSet;
    }

    public function drawResult ()
    {
        for ($i = 0; $i < 6; $i++)
        {
            $number = rand(1, 60);
            if ( $this->isUnique($number)) {
                $this->resultSet[] = $number;
            } else {
                $i--;
            }
        }

        sort($this->resultSet);

        return $this;
    }

    public function setSet ($set)
    {
        $this->resultSet = $set;
    }

    public function clear ()
    {
        $this->resultSet = [];
    }

    public function count ()
    {
        return count($this->resultSet);
    }

    public function toString ()
    {
        return implode(', ', $this->resultSet);
    }

    private function isUnique ($number)
    {
        return ! in_array($number, $this->resultSet);
    }
}
