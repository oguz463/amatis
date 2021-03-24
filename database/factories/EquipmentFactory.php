<?php

namespace Database\Factories;

use App\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EquipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rand = rand(1,3);
        $range = range(1, $rand);
        foreach ($range as $key => $value) {
          $p[$key] = $this->faker->sentence;
        }

        return [
          'name' => $this->faker->sentence,
          'date' => $this->faker->date,
          'info' => $p,
          'price' => rand(1, 1000),
          'rate' => rand(0, 100)
        ];
    }
}
