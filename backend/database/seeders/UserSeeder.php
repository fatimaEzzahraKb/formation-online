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
        User::create([
            'username'=>'AdminUser',
            'email'=>'admin@example.com',
            "password"=>Hash::make('password1234'), 
            'permission' => 'admin',
            'category_id' => null, 
            'souscategory_id' => null, 
        ]);
    }
}
