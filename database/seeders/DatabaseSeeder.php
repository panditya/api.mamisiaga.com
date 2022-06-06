<?php

namespace Database\Seeders;

use App\Models\Mother;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $mother = Mother::create([
            'name' => 'Mother 1',
            'date_of_birth' => '2000-01-01',
            'place_of_birth' => 'Jakarta',

        ]);

        $mother->user()->create([
            'email' => 'mother1@mamisiaga.com',
            'password' => Hash::make('qwerqwer'),
        ]);
    }
}
