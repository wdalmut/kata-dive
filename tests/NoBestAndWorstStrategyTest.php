<?php
namespace Kazan;

class NoBestAndWorstStrategyTest extends \PHPUnit_Framework_TestCase
{
    private $strategy;

    public function setUp()
    {
        $this->strategy = new NoBestAndWorstStrategy();
    }

    /**
     * @dataProvider votes
     */
    public function testStrategy($votes, $dive, $result)
    {
        $this->assertEquals($result, $this->strategy->votes($votes, $dive));
    }

    public function votes()
    {
        return [
            [[8,8,8,8,8], new Dive(1), 24],
            [[9,8,8,8,7], new Dive(1), 24],
            [[9,8,8,8,7], new Dive(2), 48],
            [[9,8,8,8,9], new Dive(2), 50],
        ];
    }
}
