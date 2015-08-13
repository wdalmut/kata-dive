<?php
namespace Kazan;

class NoTwoBestAndTwoWorstStrategy implements VotingStrategy
{
    public function votes(array $votes, Dive $dive)
    {
        if (count($votes) < 5) {
            throw new \InvalidArgumentException("We need at least 5 votes");
        }

        unset($votes[array_search(min($votes), $votes)]);
        unset($votes[array_search(max($votes), $votes)]);

        unset($votes[array_search(min($votes), $votes)]);
        unset($votes[array_search(max($votes), $votes)]);

        $values = array_sum($votes);

        return $values * $dive->getScore();
    }
}
