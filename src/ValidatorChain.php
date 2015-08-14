<?php
namespace Kazan;

use ArrayObject;

class ValidatorChain extends ArrayObject
{
    public function isValid($element)
    {
        foreach ($this as $filter) {
            if (($status = $filter->isValid($element)) !== null) {
                return $status;
            }
        }
    }
}
