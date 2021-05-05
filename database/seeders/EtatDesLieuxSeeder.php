<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatDesLieuxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etat_des_lieux')->insert([
            'titre'             => 'Appartement meublés 16eme',
            'type_id'           => '1',
            'ville_id'          => '1',
            'nbPieces'          => '3',
            'surface'           => '65',
            'photo'             => 'https://www.placecage.com/200/300',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);
    }
}
