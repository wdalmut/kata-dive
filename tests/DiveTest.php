<?php
namespace Kazan;

class DiveTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateDiveScore()
    {
        $dive = new Dive(2.9);
        $this->assertEquals(2.9, $dive->getScore());
    }

    /**
     * @expectedException InvalidArgumentException
     * @dataProvider invalidInputs
     */
    public function testWithInvalidInputs($input)
    {
        $dive = new Dive($input);
    }

    public function invalidInputs()
    {
        return [
            ["a"],
            [""],
            [null],
        ];
    }
}

