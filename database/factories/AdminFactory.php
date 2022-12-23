<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'superadmin',
            'email' => 'superadmin@email.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$J56dhhzvN/Y/HOb4uJ/04.aKMK3FeH6im.7cc6IHat75GLWiqaScu', // password
            'remember_token' => Str::random(10),
        ];
    }
}
