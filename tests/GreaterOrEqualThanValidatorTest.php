<?php
namespace Kazan;

class GreaterOrEqualThanValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $validator;

    public function setUp()
    {
        $this->validator = new GreaterOrEqualThanValidator(0);
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
            [1000, null],
            [1.9211, null],
            [-1, "The element: -1 is less than 0"],
            [-2, "The element: -2 is less than 0"],
            [-0.1, "The element: -0.1 is less than 0"],
        ];
    }
}
