<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory(10)->create();
        // User::factory()->create([
        //     'name'=> "kaungkaung",
        //     'email'=> "mrkaugnminnkhant@gmail.com",
        //     'password'=> Hash::make('123'),
        //     'password'=> bcrypt('123'),
        // ]);
    }
}
