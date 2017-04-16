<?php

namespace spec;

use MegaSena;
use LottoSet;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MegaSenaSpec extends ObjectBehavior
{

    public function it_draws_six_numbers_from_one_to_sixty_and_they_are_unique ()
    {

        $this->beConstructedWith(new LottoSet, new LottoSet);

        $this->drawNumbers()->resultSet()->shouldHaveCount(6);
        $this->drawNumbers()->resultSet()->shouldBeUnique();
    }

    public function it_places_bets ()
    {
        $this->beConstructedWith(new LottoSet, new LottoSet);

        $this->placeBets(1, 7, 20, 22, 44, 55);
    }

    public function it_wins_the_lottery ()
    {
        $this->beConstructedWith(new LottoSet, new LottoSet);

        $result = $this->drawNumbers()->resultSet();

        // Let's cheat!
        $this->placeBets($result);

        $this->evaluateBet()->shouldBe(true);
    }

    public function it_loses_the_lottery ()
    {
        $this->beConstructedWith(new LottoSet, new LottoSet);

        $result = $this->drawNumbers();

        // Let's lose!
        $this->placeBets(66,66,66,66,66,66);

        $this->evaluateBet()->shouldBe(false);
    }

    public function it_calculates_the_cost_of_playing_10_numbers ()
    {
        $this->beConstructedWith(new LottoSet, new LottoSet);

        $this->drawNumbers();

        $this->placeBets(1,2,3,4,5,6,7,8,9,10);

        $this->evaluateBet();

        $this->getCost()->shouldBe("420,00");

    }


    public function getMatchers ()
    {
        return [
            'beUnique' => function($arr) {
                $a = array_unique($arr);
                return count($a) == count($arr);
            }
        ];
    }
}
