<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
		$pass='123456';
		
		for($i=0; $i<10; $i++) {
			User::create([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => bcrypt($pass),
				'created_at' => NOW(),
				'updated_at' => NOW()
			]);
		}
    }
}
