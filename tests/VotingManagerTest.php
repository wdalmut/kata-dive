<?php
namespace Kazan;

use Prophecy\Argument;

class VotingManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testRequireVoting()
    {
        $strategy = $this->prophesize("Kazan\\VotingStrategy");
        $strategy->votes(Argument::Any(), Argument::Any())->willReturn(61.80);

        $dive = new Dive(2.9);

        $manager = new VotingManager($strategy->reveal());

        $this->assertEquals(61.80, $manager->getTotalScoreFor([8,8,6,4], $dive));
    }

    public function testRequireVotingIntegration()
    {
        $dive = new Dive(2.0);
        $strategy = new NoBestAndWorstStrategy();

        $manager = new VotingManager($strategy);
        $this->assertEquals(46, $manager->getTotalScoreFor([8,8,6,7,8], $dive));
    }
}
