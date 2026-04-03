<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    protected static ?string $country = 'Brasil';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->streetName(),
            'neighborhood' => $this->faker->words(random_int(1, 3), true),
            'number' => $this->faker->buildingNumber(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'country' => static::$country ??= $this->faker->country(),
            'zipcode' => $this->faker->postcode(),
        ];
    }
}
