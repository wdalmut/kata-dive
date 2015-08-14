<?php
namespace Kazan;

class LessOrEqualThanValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $validator;

    public function setUp()
    {
        $this->validator = new LessOrEqualThanValidator(10);
    }

    /**
     * @dataProvider inputs
     */
    public function testValidationProcess($input, $result)
    {
        $this->assertSame($this->validator->isValid($input), $result);
    }

    public function inputs()
    {
        return [
            [0, null],
            [1, null],
            [1.9211, null],
            [10, null],
            [10.1, "The element: 10.1 is greater than 10"],
            [10.01, "The element: 10.01 is greater than 10"],
            [11, "The element: 11 is greater than 10"],
        ];
    }
}

