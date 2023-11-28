<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InvoiceItem;

class InvoiceItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvoiceItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'invoice_id'       => Invoice::factory(),
			'item_id'          => Item::factory(),
			'item_name'        => $this->faker->word,
			'item_description' => $this->faker->text,
			'item_price'       => $this->faker->randomNumber(),
			'tax'              => $this->faker->randomDigit,
			'quantity'         => $this->faker->numberBetween($min = 1, $max = 9000),
			'total'            => $this->faker->randomNumber(),
		];
    }
}
