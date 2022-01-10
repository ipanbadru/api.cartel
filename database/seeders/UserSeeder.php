<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => "Ipan Badruzzaman",
                'email' => "ipanbzn1@gmail.com",
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ],
            [
                'name' => "Susan Nuraeni",
                'email' => "susan@gmail.com",
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ],
            [
                'name' => "Nirma Nurfadilah",
                'email' => "nirma@gmail.com",
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ],
        ])->each(function ($user){
            \App\Models\User::create($user);
        });

        collect(['admin', 'moderator'])->each(function ($role){
            \App\Models\Role::create(['name' => $role]);
        });

        \App\Models\User::find(1)->roles()->attach(1);
        \App\Models\User::find(2)->roles()->attach(2);
    }
}
