<?php
namespace Kazan;

interface VotingStrategy
{
    public function votes(array $votes, Dive $dive);
}
