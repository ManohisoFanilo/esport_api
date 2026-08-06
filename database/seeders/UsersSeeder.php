<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Mina R.', 'email' => 'mina@example.com'],
            ['name' => 'Noah K.', 'email' => 'noah@example.com'],
            ['name' => 'Ariane B.', 'email' => 'ariane@example.com'],
            ['name' => 'Kylian D.', 'email' => 'kylian@example.com'],
            ['name' => 'Sofia P.', 'email' => 'sofia@example.com'],
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => bcrypt('password123'),
                    'remember_token' => Str::random(10),
                ]
            );
        }
    }
}
