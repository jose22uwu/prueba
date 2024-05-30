<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class taskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tasktext' => fake()->text(),  //fake es una conveniencia de laravel para hacer datos dummy
            'isCompleted'=> 0, //se debe especificar el campo de la bd y el tipo de dato dummy a enviar, si se busca faker php en google se pueden ver las conveniencias que existen
            //
        ];
    }
}
