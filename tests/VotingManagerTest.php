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

    /**
     * @dataProvider strategyIntegrations
     */
    public function testRequireVotingIntegration($strategy, $votes, $dive, $result)
    {
        $manager = new VotingManager($strategy);
        $this->assertEquals($result, $manager->getTotalScoreFor($votes, $dive));
    }

    public function strategyIntegrations()
    {
        return [
            [new NoBestAndWorstStrategy(), [8,8,6,7,8], new Dive(2.0), 46],
            [new NoTwoBestAndTwoWorstStrategy(), [8,8,6,7,8,8,8], new Dive(2.0), 48],
        ];
    }

    /**
     * @expectedException InvalidArgumentException
     * @dataProvider invalidInputs
     */
    public function testIntegrationChainValidation($votes, $dive)
    {
        $strategy = $this->prophesize("Kazan\\VotingStrategy");
        $strategy->votes(Argument::Any(), Argument::Any())->shouldNotBeCalled();

        $chain = new ValidatorChain();
        $chain->append(new IsNumericValidator());
        $chain->append(new GreaterOrEqualThanValidator(0));
        $chain->append(new LessOrEqualThanValidator(10));

        $manager = new VotingManager($strategy->reveal(), $chain);

        $manager->getTotalScoreFor($votes, $dive);
    }

    public function invalidInputs()
    {
        return [
            [[8,8,8,8, -0.1], new Dive(1)],
            [[8,8,8,8,10.1], new Dive(1)],
            [[8,8,8,"pluto",10], new Dive(1)],
            [[8,8,8,"pluto",-10], new Dive(1)],
            [[8,8,8,-10,"pluto"], new Dive(1)],
        ];
    }
}
