<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super=Role::where('slug','super-admin')->first();
        User::create([
            'role_id'           => $super->id,
            'first_name'        => 'super',
            'last_name'         => 'admin',
            'email'             => 'super@gmail.com',
            'password'          => Hash::make(123456),
            'email_verified_at' => now()
        ]);
        
        $admin=Role::where('slug','admin')->first();
        User::create([
            'role_id'           => $admin->id,
            'first_name'        => 'admin',
            'last_name'         => 'admin',
            'email'             => 'admin@gmail.com',
            'password'          => Hash::make(123456),
            'email_verified_at' => now()
        ]);

        $client=Role::where('slug','client')->first();
        User::create([
            'role_id'           => $client->id,
            'first_name'        => 'client',
            'last_name'         => 'client',
            'email'             => 'client@gmail.com',
            'password'          => Hash::make(123456),
            'email_verified_at' => now()
        ]);
    }
}
