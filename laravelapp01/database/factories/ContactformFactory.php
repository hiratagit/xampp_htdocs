<?php

namespace Database\Factories;

use App\Models\Contactform;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactformFactory extends Factory
{

    protected $model = Contactform::class;

    public function definition()
    {

        $kind = [ "見積依頼", "仕事の依頼", "資料請求", "その他" ];

        return [
            'name'=>$this->faker->name,
            // 'tel'=>$this->faker->phoneNumber,
            'tel'=>$this->faker->regexify('0[0-9]{9,10}'),
            'email'=>$this->faker->email,
            'gender'=>$this->faker->numberBetween($min=1, $max=2),
            'kind'=>$this->faker->randomElement($kind),
            'text'=>$this->faker->realText(200),
        ];
    }
}
