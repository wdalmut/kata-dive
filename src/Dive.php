<?php
namespace Kazan;

final class Dive
{
    private $score;

    public function __construct($score)
    {
        $this->setScore($score);
    }

    private function setScore($score)
    {
        $this->score = $score;
    }

    public function getScore()
    {
        return $this->score;
    }
}
