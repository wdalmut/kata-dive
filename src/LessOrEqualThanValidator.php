<?php
namespace Kazan;

class LessOrEqualThanValidator implements Validator
{
    public function __construct($maximum)
    {
        $this->maximum = $maximum;
    }

    public function isValid($element)
    {
        if ($element > $this->maximum) {
            return "The element: {$element} is greater than {$this->maximum}";
        }

        return null;
    }
}

