<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuratCategory;

class KategoriSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Surat Kelahiran / Kematian',
            ],

            [
                'name' => 'Surat Keluar',
            ],

            [
                'name' => 'Surat Keterangan',
            ],            
            
        ];

        foreach ($data as $dataInserted) {

            SuratCategory::updateorCreate(
                [
                    'name' => $dataInserted['name'],
                ],
            );

        }
    }
}
