<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $countries = [
            'Alemanha', 'Argentina', 'Australia', 'Brasil', 'Bélgica', 'China', 'Canadá', 'Coreia do Sul', 
            'Dinamarca', 'Estados Unidos', 'Espanha', 'Egito', 'França', 'Finlândia', 'Grécia', 'Holanda',
            'Hungria', 'Índia', 'Itália', 'Japão', 'Jordânia', 'Qatar', 'Quênia', 'Luxemburgo', 'Líbano',
            'México', 'Malásia', 'Noruega', 'Nigéria', 'Portugal', 'Paquistão', 'Rússia', 'Romênia', 
            'Reino Unido', 'Suíça', 'Suécia', 'Turquia', 'Tailândia', 'Ucrânia'
        ];

        return [
            'name' => $this->faker->randomElement($countries),
        ];
    }
}
