<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'email' => 'admin@example.com',
            ],
            [
                'title' => 'Administratorius',
                'first_name' => 'Admin',
                'last_name' => 'Hello',
                'password' => bcrypt('admin'),
            ]
        );

    }
}
