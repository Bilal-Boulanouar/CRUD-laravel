<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('etudiants')->insert([
            [
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'email' => 'jean.dupont@example.com',
                'date_naissance' => '2000-05-15',
                'genre' => 'Homme',
                'niveau_etude' => 'Licence',
                'image' => 'etudiants/default.jpg', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Durand',
                'prenom' => 'Marie',
                'email' => 'marie.durand@example.com',
                'date_naissance' => '1998-10-20',
                'genre' => 'Femme',
                'niveau_etude' => 'Master',
                'image' => 'etudiants/default.jpg', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
