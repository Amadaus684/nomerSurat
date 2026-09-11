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
                'name' => 'Surat Masuk',
            ],
            [
                'name' => 'Surat Keluar',
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
