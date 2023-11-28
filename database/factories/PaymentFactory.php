<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'invoice_id'        => Invoice::factory()->create()->id,
			'customer_id'       => Customer::factory()->create()->id,
			'payment_method_id' => PaymentMethod::factory()->create()->id,
			'amount'            => $this->faker->randomFloat(),
			'date_payment'      =>$this->faker->dateTime,
		];
    }
}
