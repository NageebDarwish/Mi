<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "Ahmed",
            'email' => 'ahmed@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('ahmed123'), // password
            'remember_token' => Str::random(10),
        ];
    }

    public function withToken()
    {
        return $this->afterCreating(function ($user) {
            $user->createToken('token')->plainTextToken;
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
