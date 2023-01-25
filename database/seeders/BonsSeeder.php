<?php

namespace Database\Seeders;

use App\Models\bon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bon::create([
            'montant' => 120,
            'Reste' => 100,
            'fournisseur_id' => 1,
            'benefice' => 'benefice 1',
            'avance' => 0,
            'mode' => 'mode 1',
        ]);
        bon::create([
            'montant' => 120,
            'Reste' => 100,
            'fournisseur_id' => 2,
            'benefice' => 'benefice 2',
            'avance' => 10,
            'mode' => 'mode 2',
        ]);
        bon::create([
            'montant' => 120,
            'Reste' => 100,
            'fournisseur_id' => 2,
            'benefice' => 'benefice 3',
            'avance' => 0,
            'mode' => 'mode 3',
        ]);
    }
}
