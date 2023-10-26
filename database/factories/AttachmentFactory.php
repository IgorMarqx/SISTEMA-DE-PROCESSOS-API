<?php

namespace Database\Factories;

use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AttachmentFactory extends Factory
{
    protected array $type_process = ['collective', 'individual'];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'process_id' => Process::factory(),
            'user_id' => User::factory(),
            'type_process' => fake()->randomElement($this->type_process),
            'path' => fake()->filePath(),
            'type' => fake()->fileExtension(),
            'size' => fake()->randomNumber(2),
        ];
    }
}
