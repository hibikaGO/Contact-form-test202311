<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->firstName(),
            'last_name'=>$this->faker->lastName(),
            'gender'=>$this->faker->numberBetween(1,3),
            'email'=>$this->faker->safeEmail(),
            'tell'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->country(),
            'building'=>$this->faker->city(),
            'detail'=>$this->faker->text(30),
            //
        ];
    }
}
