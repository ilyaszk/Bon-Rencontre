<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = [
            [
                'nom' => 'Admin',
                'prenom' => 'Super',
                'email' => 'admin@gmail.com',
                'password' => '123456789',
                'role_as' => '1',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'role_as' => $user['role_as'],
            ]);
        }
    }
}
