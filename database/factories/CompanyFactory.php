<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'companyName' => $this->faker->company,
            'companyAddress' => $this->faker->streetAddress,
            'country' => 'Denmark',
            'town' => 'Copenhagen',
            'houseNo' => $this->faker->buildingNumber,
            'phoneNumber' => '+4550954099',
            'vatNumber' => '12345678'
        ];
    }
}
