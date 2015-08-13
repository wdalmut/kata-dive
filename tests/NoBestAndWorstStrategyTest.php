<?php
namespace Kazan;

class NoBestAndWorstStrategyTest extends \PHPUnit_Framework_TestCase
{
    protected $strategy;

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
            [[8,8,8], new Dive(2), 16], //Lowest Boundary
            [[6,8,9], new Dive(2), 16], //Lowest Boundary
        ];
    }

    /**
     * @dataProvider wrongVoters
     * @expectedException InvalidArgumentException
     */
    public function testInvalidVotersNumber($voters)
    {
        $this->strategy->votes($voters, new Dive(1));
    }

    public function wrongVoters()
    {
        return [
            [[]],
            [[1,]],
            [[1,2]],
        ];
    }
}
