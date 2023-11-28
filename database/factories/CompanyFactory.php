<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

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
		$countries=Country::all()->pluck('code');
        return [
			'name'         => $this->faker->company,
			//'logo_path'    => $this->faker->image('public/images', 640, 480, null, false),
			'email'        => $this->faker->email,
			'address'      => $this->faker->address,
			'city'         => $this->faker->city,
			'country_code' => $this->faker->randomElement($countries),
		];
    }
}
