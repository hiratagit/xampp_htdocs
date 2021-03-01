<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class TestFormProvider extends ServiceProvider
{

    public function boot()
    {
        // $validator = $this->app['validator'];
        // $validator->resolver(function($translator, $data, $rules, $messages) {
        //     return new TestValidator($translator, $data, $rules, $messages);
        // });

        Validator::extend('test', function($attribute, $value, $parameters, $validator) {
            return $value % 5 === 0;
        });
    }
}
