<?php

namespace Database\Factories;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visitor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'encrypt' => 'testing',
            'ip' => '127.0.0.0',
            'iso' => 'US',
            'country' => 'United States',
            'city' => 'New Haven',
            'state' => 'CT',
            'state_name' => 'Connecticut',
            'postal_code' => '06510',
            'lat' => 41.31,
            'lon' => -72.92,
            'date' => now(),
            'created_at' => Carbon::today()->subDays(rand(0, 365)),
            'updated_at' => Carbon::today()->subDays(rand(0, 365)),
        ];
    }
}
