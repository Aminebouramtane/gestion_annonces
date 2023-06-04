<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table("users")->insert([
           [ "name" => "admin",
            "email" => "admin@example.com",
            "password" => Hash::make("admin"),
            "role" => "admin",
            "created_at" => now(),
            "updated_at" => now()
         ],
         [ "name" => "ahmed",
            "email" => "ahmed@example.com",
            "password" => Hash::make("ahmed"),
            "role" => "moderateur",
            "created_at" => now(),
            "updated_at" => now()
         ],
         [ "name" => "sara",
            "email" => "sara@example.com",
            "password" => Hash::make("sara"),
            "role" => "annonceur",
            "created_at" => now(),
            "updated_at" => now()
         ],
           [ "name" => "Hicham alaoui",
            "email" => "alaoui@example.com",
            "password" => Hash::make("12345"),
            "role" => "annonceur",
            "created_at" => now(),
            "updated_at" => now()
         ],
         [ "name" => "Moufid Khaoula",
            "email" => "moufid@example.com",
            "password" => Hash::make("azerty"),
            "role" => "annonceur",
            "created_at" => now(),
            "updated_at" => now()
         ]

         ]);
    }
}
