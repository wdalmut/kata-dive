<?php
namespace Kazan;

use Prophecy\Argument;

class ValidatorChainTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->validator = new ValidatorChain();
    }

    public function testInOrder()
    {
        $this->validator->append(new IsNumericValidator());
        $this->validator->append(new GreaterOrEqualThanValidator(0));
        $this->validator->append(new LessOrEqualThanValidator(10));

        $this->assertInstanceOf("Kazan\\IsNumericValidator", $this->validator[0]);
    }

    public function testValidationChainStopOnFirstError()
    {
        $mock = $this->prophesize("Kazan\\Validator");
        $mock->isValid(Argument::Any())->shouldNotBeCalled();

        $this->validator->append(new IsNumericValidator());
        $this->validator->append($mock->reveal());

        $this->validator->isValid("ciao");
    }

    /**
     * @dataProvider wrongInputs
     */
    public function testValidationChainUsingInvalidInputs($input)
    {
        $this->validator->append(new IsNumericValidator());
        $this->validator->append(new GreaterOrEqualThanValidator(0));
        $this->validator->append(new LessOrEqualThanValidator(10));

        $this->assertInternalType("string", $this->validator->isValid($input));
    }

    public function wrongInputs()
    {
        return [
            ["pippo"],
            ["-1"],
            [-1],
            [11],
            ["11"],
            ["6kap"],
        ];
    }

    /**
     * @dataProvider goodInputs
     */
    public function testValidationChainUsingValidInputs($input)
    {
        $this->validator->append(new IsNumericValidator());
        $this->validator->append(new GreaterOrEqualThanValidator(0));
        $this->validator->append(new LessOrEqualThanValidator(10));

        $this->assertNull($this->validator->isValid($input));
    }

    public function goodInputs()
    {
        return array_map(function($elem){
            return [$elem];
        }, range(0, 10, 0.01));
    }
}
