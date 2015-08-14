<?php
namespace Kazan;

use InvalidArgumentException;

final class Dive
{
    private $score;

    public function __construct($score)
    {
        $this->setScore($score);
    }

    private function setScore($score)
    {
        if (!is_numeric($score)) {
            throw new InvalidArgumentException("Only numeric values are admitted");
        }

        $this->score = $score;
    }

    public function getScore()
    {
        return $this->score;
    }
}
