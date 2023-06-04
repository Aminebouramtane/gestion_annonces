<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("annonces")->insert(
            [
                [
                    "titre"=>"Terrain à vendre",
                    "description"=>"Bon emplacement",
                    "type"=>"Terrain",
                    "ville"=>"Fès",
                    "superficie"=>200,
                    "neuf"=>true,
                    "prix"=>1000000,
                    "user_id"=>4,
                    "etat"=>"en cours",
                    "created_at"=>now(),
                    "updated_at"=>now(),

                ],
                   [
                    "titre"=>"Appart à vendre",
                    "description"=>"Appart au centre ville",
                    "type"=>"Appartement",
                    "ville"=>"Meknès",
                    "superficie"=>90,
                    "neuf"=>false,
                    "prix"=>450000,
                    "user_id"=>5,
                    "etat"=>"validé",
                      "created_at"=>now(),
                    "updated_at"=>now(),
                   ],
                    [
                    "titre"=>"Maison en plein centre ville",
                    "description"=>"2 façades et des vues magnifiques",
                    "type"=>"Maison",
                    "ville"=>"Fès",
                    "superficie"=>100,
                    "neuf"=>false,
                    "prix"=>1200000,
                    "user_id"=>5,
                    "etat"=>"en cours",
                      "created_at"=>now(),
                    "updated_at"=>now(),
                    ],
                    [
                    "titre"=>"Joli appart dans un R+2",
                    "description"=>"2 chambre avec cuisine moderne",
                    "type"=>"Appartement",
                    "ville"=>"Fès",
                    "superficie"=>80,
                    "neuf"=>true,
                    "prix"=>800000,
                    "user_id"=>3,
                    "etat"=>"signalé",
                      "created_at"=>now(),
                    "updated_at"=>now(),
                ]

            ]
            );
    }
}
