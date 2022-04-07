<?php

namespace Rakit\Validation\Rules;

use Rakit\Validation\Rule;

class SaId extends Rule
{

    /** @var string */
    protected $message = "The South African ID contains an invalid value";

    /**
     * Check the $value is valid
     *
     * @param mixed $value
     * @return bool
     */
    public function check($value): bool
    {
        if (!is_numeric($value)) {
            return false;
        }
        $regex = "/^(((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229))(( |-)(\d{4})( |-)([01]8((( |-)\d{1})|\d{1}))|(\d{4}[01]8\d{1}))/";
        return preg_match($regex, $value) > 0;
    }

    
}
