<?php
namespace Kazan;

class IsNumericValidator implements Validator
{
    public function isValid($element)
    {
        if (is_numeric($element)) {
            return null;
        }

        return "The element {$element} is not numeric";
    }
}


