<?php
namespace Kazan;

class VotingManager
{
    private $strategy;

    public function __construct(VotingStrategy $strategy, ValidatorChain $chain = null)
    {
        $this->strategy = $strategy;
        $this->chain = $chain;
    }

    public function getTotalScoreFor(array $votes, Dive $dive)
    {
        if ($this->chain) {
            foreach ($votes as $vote) {
                if (($status = $this->chain->isValid($vote)) !== null) {
                    throw new \InvalidArgumentException($status);
                }
            }
        }

        $totalScore = $this->strategy->votes($votes, $dive);

        return $totalScore;
    }
}
