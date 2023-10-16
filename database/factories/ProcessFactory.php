<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProcessFactory extends Factory
{
    protected array $statesBR = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

    protected array $judgmental_organs = ['14ª Vara Federal PB', '21ª Vara Federal RJ', '13ª Vara Federal SP'];

    protected array $judicial_office = ['1ª Miro Moco', '2ª Miro Moco', '3ª Miro Moco'];

    protected array $priority = ['High', 'Medium', 'Low'];

    protected array $competence = ['JEF - JP', 'TRE - DF', 'TRF - 1ª Região'];

    protected array $type_process = ['collective', 'individual'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();

        return [
            'name'               => fake()->name(),
            'user_id'            => $user->id,
            'lawyer_id'          => $user->id,
            'subject'            => fake()->word(),
            'jurisdiction'       => fake()->randomElement($this->statesBR),
            'cause_value'        => fake()->randomFloat(2, 0, 100000),
            'justice_secret'     => fake()->boolean(),
            'free_justice'       => fake()->boolean(),
            'tutelary'           => fake()->boolean(),
            'priority'           => fake()->randomElement($this->priority),
            'judgmental_organ'   => fake()->randomElement($this->judgmental_organs),
            'judicial_office'    => fake()->randomElement($this->judicial_office),
            'competence'         => fake()->randomElement($this->competence),
            'url_collective'     => fake()->url(),
            'url_notices'        => fake()->url(),
            'email_coorporative' => fake()->email(),
            'email_client'       => fake()->email(),
            'qtd_update'         => fake()->numberBetween(0, 100),
            'qtd_finish'         => fake()->numberBetween(0, 100),
            'progress'           => fake()->boolean(),
            'finish'             => fake()->boolean(),
            'update'             => fake()->boolean(),
            'type_process'       => fake()->randomElement($this->type_process),
        ];
    }
}
