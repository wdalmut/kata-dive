<?php
namespace Kazan;

class NoBestAndWorstStrategy implements VotingStrategy
{
    protected $minimumVotes;

    public function __construct()
    {
        $this->minimumVotes = 3;
    }

    public function votes(array $votes, Dive $dive)
    {
        if (count($votes) < $this->minimumVotes) {
            throw new \InvalidArgumentException("We need at least {$this->minimumVotes} votes");
        }

        $values = $this->getTheFinalSumUp($votes);

        return $values * $dive->getScore();
    }

    protected function getTheFinalSumUp(array $votes)
    {
        return array_sum($this->filterOutBestAndWorst($votes));
    }

    protected function filterOutBestAndWorst($votes)
    {
        unset($votes[array_search(min($votes), $votes)]);
        unset($votes[array_search(max($votes), $votes)]);

        return $votes;
    }
}
