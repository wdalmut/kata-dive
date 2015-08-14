<?php
namespace Kazan;

class NoTwoBestAndTwoWorstStrategy extends NoBestAndWorstStrategy
{
    public function __construct()
    {
        $this->minimumVotes = 5;
    }

    protected function getTheFinalSumUp(array $votes)
    {
        return array_sum(
            $this->filterOutBestAndWorst(
                $this->filterOutBestAndWorst($votes)
            )
        );
    }
}
