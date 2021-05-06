<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Core\Number;
use Faker\Guesser\Name;
use Faker\Provider\Address;
use Faker\Provider\en_GB\PhoneNumber;
use Faker\Provider\Lorem;
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
        for ($i = 0; $i<10; $i++)
        {
            DB::table('etat_des_lieux')->insert([
                'titre'             => Lorem::sentence(4),
                'type_id'           => random_int(1,4),
                'ville_id'          => random_int(1,5),
                'nbPieces'          => random_int(1,5),
                'surface'           => random_int(20,250),
                'photo'             => 'photo7722.jpg',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ]);
        }

    }
}
