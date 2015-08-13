<?php
namespace Kazan;

class VotingManager
{
    private $strategy;

    public function __construct(VotingStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getTotalScoreFor(array $votes, Dive $dive)
    {
        $totalScore = $this->strategy->votes($votes, $dive);

        return $totalScore;
    }
}
