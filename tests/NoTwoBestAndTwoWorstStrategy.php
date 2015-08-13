<?php
namespace Kazan;

class NoTwoBestAndTwoWorstStrategyTest extends \PHPUnit_Framework_TestCase
{
    private $strategy;

    public function setUp()
    {
        $this->strategy = new NoTwoBestAndTwoWorstStrategy();
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
            [[8,8,8,8,8,8,8], new Dive(1), 24],
            [[9,8,8,8,7,8,8], new Dive(1), 24],
            [[9,8,8,8,7,8,8], new Dive(2), 48],
            [[9,8,8,8,9,8,8], new Dive(2), 48],
            [[8,8,8,8,8], new Dive(2), 16], //Lowest Boundary
            [[6,8,9,8,8], new Dive(2), 16], //Lowest Boundary
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
            [[1,2,3]],
            [[1,2,3,4]],
        ];
    }
}

