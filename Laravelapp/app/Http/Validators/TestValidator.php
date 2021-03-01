<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class TestValidator extends Validator {

    public function validateTest($attribute, $value, $parameters) {
            return $value % 2 === 0;
    }

}