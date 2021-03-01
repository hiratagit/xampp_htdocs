<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MyTestRule implements Rule
{

    public function __construct($n)
    {
        $this->num = $n;
    }

    public function passes($attribute, $value)
    {
        return is_numeric($value) && $value % $this->num === 0;
    }

    public function message()
    {
        return "{$this->num}で割り切れる値が必要です";
    }
}
