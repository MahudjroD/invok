<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Invoice::class;
	
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$currencies = Currency::all()->pluck('code');
		$date_issue = $this->faker->dateTimeBetween('+0 days', '+1 month');
		$date_issue_clone = clone $date_issue;
		
		$date_due = $this->faker->dateTimeBetween($date_issue, $date_issue_clone->modify('+5 hours'));
		
		
		return [
			'author_id'     => User::factory()->create()->id,
			'agent_id'      => User::factory()->create()->id,
			'customer_id'   => Customer::factory()->create()->id,
			'project_id'    => Project::factory()->create()->id,
			'currency_code' => $this->faker->randomElement($currencies),
			'invoice_ref'   => $this->faker->numerify('N° ####'),
			'tax'           => 18,
			'message'       => $this->faker->word,
			'date_issue'    => $date_issue,
			'date_due'      => $date_due,
			'amount'        => $this->faker->randomFloat(),
			'discount'      => $this->faker->randomNumber(),
			'status'        => $this->faker->randomElement(['paid', 'unpaid', 'partially paid']),
			'is_estimation' =>$this->faker->randomElement([0,1])
		];
	}
}
