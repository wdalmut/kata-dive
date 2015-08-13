<?php
namespace Kazan;

class NoBestAndWorstStrategy implements VotingStrategy
{
    public function votes(array $votes, Dive $dive)
    {
        unset($votes[array_search(min($votes), $votes)]);
        unset($votes[array_search(max($votes), $votes)]);

        $values = array_sum($votes);

        return $values * $dive->getScore();
    }
}
