<?php

namespace Database\Seeders;

use App\Models\fournisseur as ModelsFournisseur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Fournisseur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsFournisseur::create([
            'prix_HT' => 120,
            'prix_TTC' => 100,
            'mode_payement' => "mode 1",
            'nom' => 'nom 1',
            'déja_versé' => "oui",
            'livraison' => 'livraison',
        ]);
        ModelsFournisseur::create([
            'prix_HT' => 120,
            'prix_TTC' => 100,
            'mode_payement' => "mode 2",
            'nom' => 'nom 2',
            'déja_versé' => "oui",
            'livraison' => 'livraison',
        ]);
        ModelsFournisseur::create([
            'prix_HT' => 120,
            'prix_TTC' => 100,
            'mode_payement' => "mode 3",
            'nom' => 'nom 3',
            'déja_versé' => "oui",
            'livraison' => 'livraison',
        ]);
        ModelsFournisseur::create([
            'prix_HT' => 120,
            'prix_TTC' => 100,
            'mode_payement' => "mode 4",
            'nom' => 'nom 4',
            'déja_versé' => "oui",
            'livraison' => 'livraison',
        ]);
    }
}
