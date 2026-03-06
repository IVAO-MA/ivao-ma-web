<?php

namespace Database\Seeders;

use App\Models\WikiDomain;
use App\Models\WikiManual;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WikiSeeder extends Seeder
{
    public function run(): void
    {
        $domains = [
            [
                'name' => ['en' => 'General Hub', 'fr' => 'Généralités'],
                'slug' => 'general-hub',
                'description' => [
                    'en' => 'Welcome, rules, regulations, and software setup.',
                    'fr' => 'Bienvenue, règles, réglementations et configuration logicielle.'
                ],
                'sort_order' => 10,
                'manuals' => [
                    ['name' => ['en' => 'Welcome to IVAO Morocco', 'fr' => 'Bienvenue sur IVAO Maroc']],
                    ['name' => ['en' => 'Software & Configuration', 'fr' => 'Logiciels & Configuration']],
                ]
            ],
            [
                'name' => ['en' => 'Air Traffic Control', 'fr' => 'Contrôle Aérien'],
                'slug' => 'atc-procedures',
                'description' => [
                    'en' => 'Airspace, procedures, and manuals for ATCs in the GMMM FIR.',
                    'fr' => 'Espace aérien, procédures et manuels pour les ATC dans la FIR GMMM.'
                ],
                'sort_order' => 20,
                'manuals' => [
                    ['name' => ['en' => 'ADC / TWR Procedures', 'fr' => 'Procédures ADC / TWR']],
                    ['name' => ['en' => 'APC / APP Procedures', 'fr' => 'Procédures APC / APP']],
                    ['name' => ['en' => 'ACC / CTR Procedures', 'fr' => 'Procédures ACC / CTR']],
                    ['name' => ['en' => 'Phraseology & Communications', 'fr' => 'Phraséologie & Communications']],
                ]
            ],
            [
                'name' => ['en' => 'Flight Operations', 'fr' => 'Opérations de Vol'],
                'slug' => 'flight-operations',
                'description' => [
                    'en' => 'VFR/IFR rules, meteorology, and pilot training for Morocco.',
                    'fr' => 'Règles VFR/IFR, météorologie et formation des pilotes au Maroc.'
                ],
                'sort_order' => 30,
                'manuals' => [
                    ['name' => ['en' => 'VFR in Morocco', 'fr' => 'VFR au Maroc']],
                    ['name' => ['en' => 'IFR in Morocco', 'fr' => 'IFR au Maroc']],
                    ['name' => ['en' => 'Pilot Training', 'fr' => 'Formation Pilote']],
                ]
            ],
        ];

        foreach ($domains as $domainData) {
            $manuals = $domainData['manuals'];
            unset($domainData['manuals']);

            $domain = WikiDomain::create($domainData);

            $manualSort = 10;
            foreach ($manuals as $manualData) {
                $manualData['domain_id'] = $domain->id;
                $manualData['slug'] = Str::slug($manualData['name']['en']);
                $manualData['sort_order'] = $manualSort;
                WikiManual::create($manualData);
                $manualSort += 10;
            }
        }
    }
}
