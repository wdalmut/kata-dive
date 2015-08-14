<?php
namespace Kazan;

class IsNumericValidatorTest extends \PHPUnit_Framework_TestCase
{
    private $validator;

    public function setUp()
    {
        $this->validator = new IsNumericValidator();
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
            ["10", null],
            ["1.09", null],
            ["ciao", "The element ciao is not numeric"],
            ["12kap", "The element 12kap is not numeric"],
        ];
    }
}


