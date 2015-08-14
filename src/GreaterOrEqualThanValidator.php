<?php
namespace Kazan;

class GreaterOrEqualThanValidator implements Validator
{
    public function __construct($minimum)
    {
        $this->minimum = $minimum;
    }

    public function isValid($element)
    {
        if ($element < $this->minimum) {
            return "The element: {$element} is less than {$this->minimum}";
        }

        return null;
    }
}
