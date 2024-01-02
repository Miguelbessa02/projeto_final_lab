<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $cities = [
            'Berlim', 'Buenos Aires', 'Sydney', 'Rio de Janeiro', 'Bruxelas', 'Pequim', 'Toronto', 'Seul',
            'Copenhague', 'Nova Iorque', 'Los Angeles', 'Chicago', 'Madrid', 'Cairo', 'Paris', 'Helsinque', 
            'Atenas', 'Amsterdã', 'Budapeste', 'Nova Deli', 'Roma', 'Tóquio', 'Amã', 'Doha', 'Nairobi', 
            'Luxemburgo', 'Beirute', 'Cidade do México', 'Kuala Lumpur', 'Oslo', 'Lagos', 'Lisboa', 'Porto', 
            'Islamabad', 'Moscou', 'Bucareste', 'Londres', 'Zurique', 'Estocolmo', 'Istambul', 'Bangkok', 'Kiev'
        ];

        return [
            'name' => $this->faker->randomElement($cities),
            'country_id' => Country::all()->random()->id,
        ];
    }
}
