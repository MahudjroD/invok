<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Country;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Customer::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$countries=Country::all()->pluck('code');
		return [
			'company_id'   => Company::factory()->create()->id,
			'author_id'    => User::factory()->create()->id,
			'name'         => $this->faker->name,
			'phone_number' => $this->faker->phoneNumber,
			'email'        => $this->faker->email,
			'address'      => $this->faker->address,
			'city'         => $this->faker->city,
			'country_code' => $this->faker->randomElement($countries),
		];
	}
}
