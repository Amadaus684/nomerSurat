<?php

namespace Database\Seeders;

use App\Models\Klasifikasi;
use Illuminate\Database\Seeder;

class KlasifikasiSuratSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // 000.1 Ketatausahaan dan Kerumahtanggaan

            [
                'number' => '000',
                'description' => 'Umum',
            ],

            [
                'number' => '000.1',
                'description' => 'Ketatausahaan dan Kerumahtanggaan',
            ],

            [
                'number' => '000.1.1',
                'description' => 'Telekomunikasi',
            ],

            [
                'number' => '000.1.2',
                'description' => 'Perjalanan Dinas Dalam Negeri',
            ],

            [
                'number' => '000.1.2.3',
                'description' => 'Perjalanan Dinas Pegawai',
            ],

            [
                'number' => '000.1.4',
                'description' => 'Penggunaan Fasilitas Kantor',
            ],

            [
                'number' => '000.1.5',
                'description' => 'Rapat Pimpinan',
            ],

            [
                'number' => '000.1.6',
                'description' => 'Penyediaan Konsumsi',
            ],

            [
                'number' => '000.1.7',
                'description' => 'Pengurusan Kendaraan Dinas',
            ],

            [
                'number' => '000.1.7.1',
                'description' => 'Pengurusan Surat-Surat Kendaraan Dinas',
            ],

            [
                'number' => '000.1.7.2',
                'description' => 'Pemeliharaan dan Perbaikan',
            ],

            [
                'number' => '000.1.7.3',
                'description' => 'Pengurusan Kehilangan dan Masalah Kendaraan',
            ],

            [
                'number' => '000.1.8',
                'description' => 'Pemeliharaan Gedung, Taman dan Peralatan Kantor',
            ],

            [
                'number' => '000.1.8.1',
                'description' => 'Pertamanan / Landscape',
            ],

            [
                'number' => '000.1.8.2',
                'description' => 'Penghijauan',
            ],

            [
                'number' => '000.1.8.3',
                'description' => 'Perbaikan Gedung',
            ],

            [
                'number' => '000.1.8.4',
                'description' => 'Perbaikan Peralatan Kantor',
            ],

            [
                'number' => '000.1.8.5',
                'description' => 'Perbaikan Rumah Dinas / Wisma',
            ],

            [
                'number' => '000.1.8.6',
                'description' => 'Kebersihan Gedung dan Taman',
            ],

            [
                'number' => '000.1.9',
                'description' => 'Pengelolaan Jaringan Listrik, Air, Telepon dan Komputer',
            ],

            [
                'number' => '000.1.9.1',
                'description' => 'Perbaikan / Pemeliharaan',
            ],

            [
                'number' => '000.1.9.2',
                'description' => 'Pemasangan',
            ],

            [
                'number' => '000.1.10',
                'description' => 'Ketertiban dan Keamanan',
            ],

            [
                'number' => '000.1.10.1',
                'description' => 'Pengamanan, Penjagaan, dan Pengawalan terhadap Pejabat, Kantor dan Rumah Dinas',
            ],

            [
                'number' => '000.1.10.2',
                'description' => 'Laporan Ketertiban dan Keamanan',
            ],

            [
                'number' => '000.1.11',
                'description' => 'Administrasi Pengelolaan Parkir',
            ],

            [
                'number' => '000.1.12',
                'description' => 'Administrasi Pakaian Dinas Pegawai, Satpam, Petugas Kebersihan dan Pegawai Lainnya',
            ],

            // 000.2 Perlengkapan

            [
                'number' => '000.2',
                'description' => 'Perlengkapan',
            ],

            [
                'number' => '000.2.1',
                'description' => 'Inventarisasi dan Penyimpanan',
            ],

            [
                'number' => '000.2.1.1',
                'description' => 'Data Hasil Inventarisasi dan Penyimpanan',
            ],

            [
                'number' => '000.2.1.2',
                'description' => 'Laporan dan Evaluasi Inventarisasi dan Penyimpanan',
            ],

            [
                'number' => '000.2.2',
                'description' => 'Pemeliharaan Peralatan Kantor',
            ],

            [
                'number' => '000.2.2.1',
                'description' => 'Data Hasil Pemeliharaan Kantor',
            ],

            [
                'number' => '000.2.2.2',
                'description' => 'Laporan dan Evaluasi Pemeliharaan Kantor',
            ],

            [
                'number' => '000.2.3',
                'description' => 'Distribusi',
            ],

            [
                'number' => '000.2.3.1',
                'description' => 'Barang Habis Pakai',
            ],

            [
                'number' => '000.2.3.2',
                'description' => 'Barang Milik Daerah',
            ],

            [
                'number' => '000.2.4',
                'description' => 'Penghapusan Barang Milik Daerah',
            ],

            [
                'number' => '000.2.5',
                'description' => 'Pengelolaan Database Barang Milik Daerah',
            ],

            // 000.3 Pengadaan

            [
                'number' => '000.3',
                'description' => 'Pengadaan',
            ],

            [
                'number' => '000.3.1',
                'description' => 'Rencana Pengadaan Barang dan Jasa',
            ],

            [
                'number' => '000.3.2',
                'description' => 'Pengadaan Langsung',
            ],

            [
                'number' => '000.3.3',
                'description' => 'Pengadaan Tidak Langsung / Lelang',
            ],

            [
                'number' => '000.3.4',
                'description' => 'Swakelola',
            ],

            [
                'number' => '000.3.5',
                'description' => 'Pengolahan Sistem Informasi Pengadaan',
            ],

            [
                'number' => '000.3.6',
                'description' => 'Monitoring dan Evaluasi Pelaksanaan Kebijakan dan Pelaksanaan Pengadaan',
            ],

            // 000.5 Kearsipan

            [
                'number' => '000.5',
                'description' => 'Kearsipan',
            ],

            [
                'number' => '000.5.1',
                'description' => 'Kebijakan di Bidang Kearsipan yang Dilakukan oleh Pemerintah Daerah',
            ],

            [
                'number' => '000.5.3',
                'description' => 'Pengelolaan Arsip Dinamis',
            ],

            [
                'number' => '000.5.3.1',
                'description' => 'Penciptaan',
            ],

            [
                'number' => '000.5.3.2',
                'description' => 'Pemberkasan Arsip Aktif',
            ],

            [
                'number' => '000.5.3.3',
                'description' => 'Penataan Arsip Inaktif',
            ],

            [
                'number' => '000.5.3.4',
                'description' => 'Penggunaan',
            ],

            [
                'number' => '000.5.3.5',
                'description' => 'Autentikasi Arsip Dinamis',
            ],

            [
                'number' => '000.5.4',
                'description' => 'Program Arsip Vital',
            ],

            [
                'number' => '000.5.5',
                'description' => 'Pengelolaan Arsip Terjaga',
            ],

            [
                'number' => '000.5.6',
                'description' => 'Penyusutan Arsip',
            ],

            [
                'number' => '000.5.6.1',
                'description' => 'Pemindahan Arsip',
            ],

            [
                'number' => '000.5.6.2',
                'description' => 'Pemusnahan Arsip',
            ],

            [
                'number' => '000.5.6.3',
                'description' => 'Penyerahan Arsip Statis',
            ],

            [
                'number' => '000.5.7',
                'description' => 'Alih Media Arsip',
            ],

            [
                'number' => '000.5.8',
                'description' => 'Database Pengelolaan Arsip Dinamis',
            ],

            [
                'number' => '000.5.8.1',
                'description' => 'Database Pengelolaan Arsip Aktif',
            ],

            [
                'number' => '000.5.8.2',
                'description' => 'Database Pengelolaan Arsip Inaktif',
            ],

            // 000.7 Perencanaan Pembangunan

            [
                'number' => '000.7',
                'description' => 'Perencanaan Pembangunan',
            ],

            [
                'number' => '000.7.1',
                'description' => 'Musyawarah Perencanaan Pembangunan / Musrenbang',
            ],

            [
                'number' => '000.7.1.6',
                'description' => 'Musrenbang Desa',
            ],

            // 100.2 Pemerintahan Umum

            [
                'number' => '100.2',
                'description' => 'Pemerintahan Umum',
            ],

            [
                'number' => '100.2.1',
                'description' => 'Kebijakan di bidang Pemerintahan Umum yang dilakukan oleh Pemerintah Daerah',
            ],

            [
                'number' => '100.2.2',
                'description' => 'Dekonsentrasi dan Kerjasama',
            ],

            [
                'number' => '100.2.3',
                'description' => 'Wilayah Administrasi dan Perbatasan',
            ],

            [
                'number' => '100.2.3.1',
                'description' => 'Toponimi dan Data Wilayah',
            ],

            [
                'number' => '100.2.3.3',
                'description' => 'Batas Antar Daerah Wilayah',
            ],

            [
                'number' => '100.2.3.4',
                'description' => 'Penataan Batas Wilayah Antar Kecamatan, Batas Wilayah Antar Kelurahan Satu Kecamatan dan Batas Wilayah Kelurahan Antar Kecamatan',
            ],

            [
                'number' => '100.2.3.5',
                'description' => 'Pemeliharaan Batas Wilayah',
            ],

            [
                'number' => '100.2.4',
                'description' => 'Fasilitasi Kecamatan',
            ],

            [
                'number' => '100.2.5',
                'description' => 'Fasilitasi Pelayanan Umum',
            ],

            // 100.3 Hukum

            [
                'number' => '100.3',
                'description' => 'Hukum',
            ],

            [
                'number' => '100.3.1',
                'description' => 'Program Legislasi',
            ],

            [
                'number' => '100.3.1.1',
                'description' => 'Bahan/Materi Program Legislasi Daerah',
            ],

            [
                'number' => '100.3.1.2',
                'description' => 'Program Legislasi',
            ],

            [
                'number' => '100.3.2',
                'description' => 'Rancangan Peraturan Perundang-Undangan',
            ],

            [
                'number' => '100.3.3',
                'description' => 'Keputusan/Ketetapan Pimpinan Pemerintah',
            ],

            [
                'number' => '100.3.4',
                'description' => 'Instruksi / Surat Edaran',
            ],

            [
                'number' => '100.3.5',
                'description' => 'Surat Perintah',
            ],

            [
                'number' => '100.3.6',
                'description' => 'Standar/Pedoman/Prosedur Kerja/Petunjuk Pelaksanaan/Petunjuk Teknis',
            ],

            [
                'number' => '100.3.7',
                'description' => 'Nota Kesepakatan/Memorandum of Understanding (MOU)/Kontrak/Perjanjian Kerja Sama',
            ],

            [
                'number' => '100.3.7.1',
                'description' => 'Dalam Negeri',
            ],

            [
                'number' => '100.3.8',
                'description' => 'Dokumentasi Hukum',
            ],

            [
                'number' => '100.3.9',
                'description' => 'Sosialisasi/Penyuluhan/Pembinaan Hukum',
            ],

            [
                'number' => '100.3.10',
                'description' => 'Bantuan/Konsultasi Hukum/Advokasi',
            ],

            [
                'number' => '100.3.11',
                'description' => 'Kasus/Sengketa Hukum',
            ],

            [
                'number' => '100.3.11.1',
                'description' => 'Pidana',
            ],

            [
                'number' => '100.3.11.2',
                'description' => 'Perdata',
            ],

            [
                'number' => '100.3.11.3',
                'description' => 'Tata Usaha Negara',
            ],

            [
                'number' => '100.3.11.6',
                'description' => 'Sengketa Adat',
            ],

            [
                'number' => '100.3.12',
                'description' => 'Perijinan',
            ],

            // 200.1 Kesatuan Bangsa dan Politik

            [
                'number' => '200',
                'description' => 'Politik',
            ],

            [
                'number' => '200.1',
                'description' => 'Kesatuan Bangsa dan Politik',
            ],

            [
                'number' => '200.1.1',
                'description' => 'Kebijakan di bidang Kesatuan Bangsa dan Politik yang dilakukan oleh Pemerintah Daerah',
            ],

            [
                'number' => '200.1.2',
                'description' => 'Bina Ideologi dan Wawasan Kebangsaan',
            ],

            [
                'number' => '200.1.2.1',
                'description' => 'Ketahanan Ideologi Negara',
            ],

            [
                'number' => '200.1.2.2',
                'description' => 'Wawasan Kebangsaan',
            ],

            [
                'number' => '200.1.2.3',
                'description' => 'Bela Negara',
            ],

            [
                'number' => '200.1.2.4',
                'description' => 'Nilai-Nilai Sejarah Kebangsaan',
            ],

            [
                'number' => '200.1.2.5',
                'description' => 'Pembauran dan Kewarganegaraan',
            ],

            // 200.1.3 Kewaspadaan Nasional

            [
                'number' => '200.1.3',
                'description' => 'Kewaspadaan Nasional',
            ],

            [
                'number' => '200.1.3.3',
                'description' => 'Fasilitasi dan Evaluasi Penanganan Konflik Pemerintahan',
            ],

            [
                'number' => '200.1.3.4',
                'description' => 'Fasilitasi dan Laporan Penanganan Konflik Sosial',
            ],

            // 200.1.4 Ketahanan Seni, Budaya, Adat, Agama, dan Kemasyarakatan

            [
                'number' => '200.1.4',
                'description' => 'Ketahanan Seni, Budaya, Adat, Agama, dan Kemasyarakatan',
            ],

            [
                'number' => '200.1.4.1',
                'description' => 'Ketahanan Seni',
            ],

            [
                'number' => '200.1.4.2',
                'description' => 'Ketahanan Budaya',
            ],

            [
                'number' => '200.1.4.3',
                'description' => 'Agama dan Kepercayaan',
            ],

            [
                'number' => '200.1.4.4',
                'description' => 'Organisasi Kemasyarakatan',
            ],

            [
                'number' => '200.1.4.5',
                'description' => 'Masalah Sosial Kemasyarakatan',
            ],

            [
                'number' => '200.1.4.6',
                'description' => 'Fasilitasi',
            ],

            [
                'number' => '200.1.4.7',
                'description' => 'Pelaksanaan Identifikasi dan Kompilasi Organisasi Masyarakat',
            ],

            [
                'number' => '200.1.4.8',
                'description' => 'Laporan Hasil Kerjasama Kegiatan Dengan Ormas/LNL',
            ],

            [
                'number' => '200.1.4.9',
                'description' => 'Evaluasi Aktifitas Ormas: Sanksi Administrasi',
            ],

            [
                'number' => '200.1.4.10',
                'description' => 'Fasilitasi Sengketa Ormas',
            ],

            [
                'number' => '200.1.4.11',
                'description' => 'Fasilitasi Ormas',
            ],

            // 200.1.5 Politik Dalam Negeri

            [
                'number' => '200.1.5',
                'description' => 'Politik Dalam Negeri',
            ],

            [
                'number' => '200.1.5.1',
                'description' => 'Implementasi Kebijakan Politik',
            ],

            [
                'number' => '200.1.5.2',
                'description' => 'Fasilitasi Kelembagaan Politik Pemerintahan',
            ],

            [
                'number' => '200.1.5.8',
                'description' => 'Pendidikan Budaya Politik',
            ],

            [
                'number' => '200.1.5.9',
                'description' => 'Pemilihan Umum',
            ],

            // 200.2 Pemilu

            [
                'number' => '200.2',
                'description' => 'Pemilu',
            ],

            [
                'number' => '200.2.1',
                'description' => 'Kebijakan di bidang Pemilu yang dilakukan oleh Pemerintah Daerah',
            ],

            [
                'number' => '200.2.2',
                'description' => 'Pemutakhiran dan Penyusunan Daftar Pemilih',
            ],

            [
                'number' => '200.2.2.1',
                'description' => 'Daftar Penduduk Potensial Pemilih (DP4) Pemilu',
            ],

            [
                'number' => '200.2.2.2',
                'description' => 'Daftar Pemilih Sementara (DPS)',
            ],

            [
                'number' => '200.2.2.3',
                'description' => 'Daftar Pemilih Tambahan',
            ],

            [
                'number' => '200.2.2.4',
                'description' => 'Keputusan KPU tentang Daftar Pemilih Tetap (DPT)',
            ],

            [
                'number' => '200.2.2.5',
                'description' => 'Rekapitulasi Daftar Pemilih Tetap (DPT)',
            ],

            // 300.2 Penanggulangan Bencana, Pencarian, dan Pertolongan

            [
                'number' => '300.2',
                'description' => 'Penanggulangan Bencana, Pencarian, dan Pertolongan',
            ],

            [
                'number' => '300.2.1',
                'description' => 'Kebijakan di bidang Penanggulangan Bencana yang dilakukan oleh Pemerintah Daerah',
            ],

            [
                'number' => '300.2.2',
                'description' => 'Perencanaan Penanggulangan Bencana, Pencarian, dan Pertolongan',
            ],

            // 400 – Kesejahteraan Rakyat

            [
                'number' => '400',
                'description' => 'Kesejahteraan Rakyat',
            ],

            [
                'number' => '400.1',
                'description' => 'Pembangunan Daerah Tertinggal',
            ],

            [
                'number' => '400.2',
                'description' => 'Pemberdayaan Perempuan dan Perlindungan Anak',
            ],

            [
                'number' => '400.3',
                'description' => 'Pendidikan',
            ],

            [
                'number' => '400.3.2',
                'description' => 'Pendidikan Anak Usia Dini (PAUD) Nonformal, Informal',
            ],

            [
                'number' => '400.3.3',
                'description' => 'Pendidikan Masyarakat',
            ],

            [
                'number' => '400.3.3.1',
                'description' => 'Penyelenggaraan Program',
            ],

            [
                'number' => '400.3.3.2',
                'description' => 'Penilaian dan Pemberian Bantuan Sosial',
            ],

            [
                'number' => '400.3.3.3',
                'description' => 'Pembinaan Program',
            ],

            [
                'number' => '400.3.3.7',
                'description' => 'Sosialisasi',
            ],

            [
                'number' => '400.3.5',
                'description' => 'Pendidikan Dasar dan Menengah Pertama',
            ],

            [
                'number' => '400.3.12',
                'description' => 'Data dan Statistik Pendidikan',
            ],

            [
                'number' => '400.3.13',
                'description' => 'Prasarana dan Sarana Pendidikan',
            ],

            [
                'number' => '400.4',
                'description' => 'Keolahragaan',
            ],

            [
                'number' => '400.5',
                'description' => 'Kepemudaan',
            ],

            [
                'number' => '400.6',
                'description' => 'Kebudayaan',
            ],

            [
                'number' => '400.7',
                'description' => 'Kesehatan',
            ],

            [
                'number' => '400.7.22',
                'description' => 'Surat Keterangan, Sertifikasi dan Perijinan',
            ],

            [
                'number' => '400.7.22.1',
                'description' => 'Surat Keterangan',
            ],

            [
                'number' => '400.7.22.2',
                'description' => 'Sertifikasi dan Perijinan',
            ],

            [
                'number' => '400.7.23',
                'description' => 'Penanggulangan Krisis Kesehatan',
            ],

            [
                'number' => '400.8',
                'description' => 'Agama dan Kepercayaan',
            ],

            [
                'number' => '400.8.2',
                'description' => 'Fasilitasi',
            ],

            [
                'number' => '400.8.2.1',
                'description' => 'Data Forum Komunikasi Umat Beragama (FKUB) Prov/Kab/Kota',
            ],

            [
                'number' => '400.8.2.2',
                'description' => 'Pelaksanaan Kerukunan Umat Beragama dan Kepercayaan',
            ],

            [
                'number' => '400.8.3',
                'description' => 'Pembinaan Kepercayaan Kepada Tuhan YME',
            ],

            [
                'number' => '400.9',
                'description' => 'Sosial',
            ],

            [
                'number' => '400.9.2',
                'description' => 'Kesejahteraan Sosial Anak',
            ],

            [
                'number' => '400.9.3',
                'description' => 'Rehabilitasi Sosial',
            ],

            [
                'number' => '400.9.6',
                'description' => 'Pelayanan Sosial Lanjut Usia',
            ],

            [
                'number' => '400.9.9',
                'description' => 'Perlindungan Sosial Korban Bencana Sosial',
            ],

            [
                'number' => '400.9.10',
                'description' => 'Perlindungan Sosial Korban Bencana Alam',
            ],

            [
                'number' => '400.9.11',
                'description' => 'Jaminan Sosial',
            ],

            [
                'number' => '400.9.12',
                'description' => 'Pemberdayaan Keluarga dan Kelembagaan Sosial',
            ],

            [
                'number' => '400.9.12.5',
                'description' => 'Karang Taruna',
            ],

            [
                'number' => '400.9.14',
                'description' => 'Penanggulangan Kemiskinan Perkotaan dan Perdesaan',
            ],

            [
                'number' => '400.10',
                'description' => 'Pemberdayaan Masyarakat Desa',
            ],

            [
                'number' => '400.10.2',
                'description' => 'Pemerintahan Desa dan Kelurahan',
            ],

            [
                'number' => '400.10.2.1',
                'description' => 'Fasilitasi Pengembangan Desa dan Kelurahan',
            ],

            [
                'number' => '400.10.2.2',
                'description' => 'Administrasi Pemerintahan Desa dan Kelurahan',
            ],

            [
                'number' => '400.10.2.3',
                'description' => 'Fasilitasi Permusyawaratan Desa',
            ],

            [
                'number' => '400.10.2.4',
                'description' => 'Fasilitasi Pengelolaan Keuangan dan Aset Desa',
            ],

            [
                'number' => '400.10.2.5',
                'description' => 'Pengembangan Kapasitas Desa',
            ],

            [
                'number' => '400.10.3',
                'description' => 'Kelembagaan dan Pelatihan Masyarakat',
            ],

            [
                'number' => '400.10.3.1',
                'description' => 'Lembaga Masyarakat',
            ],

            [
                'number' => '400.10.3.2',
                'description' => 'Pembangunan Partisipatif',
            ],

            [
                'number' => '400.10.3.3',
                'description' => 'Pendataan Potensi Masyarakat',
            ],

            [
                'number' => '400.10.3.4',
                'description' => 'Pengembangan Kawasan Perdesaan',
            ],

            [
                'number' => '400.10.3.5',
                'description' => 'Pelatihan Masyarakat',
            ],

            [
                'number' => '400.10.4',
                'description' => 'Pemberdayaan Adat dan Sosial Budaya Masyarakat',
            ],

            [
                'number' => '400.10.4.1',
                'description' => 'Budaya Nusantara',
            ],

            [
                'number' => '400.10.4.2',
                'description' => 'Pemberdayaan Perempuan',
            ],

            [
                'number' => '400.10.4.3',
                'description' => 'Pemberdayaan dan Kesejahteraan Keluarga',
            ],

            [
                'number' => '400.10.4.4',
                'description' => 'Kesejahteraan Sosial',
            ],

            [
                'number' => '400.10.4.5',
                'description' => 'Tenaga Kerja Perdesaan',
            ],

            [
                'number' => '400.10.5',
                'description' => 'Usaha Ekonomi Masyarakat',
            ],

            [
                'number' => '400.10.5.1',
                'description' => 'Usaha Pertanian dan Pangan',
            ],

            [
                'number' => '400.10.5.2',
                'description' => 'Usaha Perkreditan dan Simpan Pinjam',
            ],

            [
                'number' => '400.10.5.3',
                'description' => 'Produksi dan Pemasaran',
            ],

            [
                'number' => '400.10.5.4',
                'description' => 'Usaha Ekonomi dan Keluarga',
            ],

            [
                'number' => '400.10.5.5',
                'description' => 'Ekonomi Perdesaan dan Masyarakat Tertinggal',
            ],

            [
                'number' => '400.10.6',
                'description' => 'Sumberdaya Alam dan Teknologi Tepat Guna Perdesaan',
            ],

            [
                'number' => '400.10.6.1',
                'description' => 'Fasilitasi Konservasi dan Rehabilitasi Lingkungan Perdesaan',
            ],

            [
                'number' => '400.10.6.2',
                'description' => 'Fasilitasi Pemanfaatan Lahan dan Pesisir Perdesaan',
            ],

            [
                'number' => '400.10.6.3',
                'description' => 'Fasilitasi Prasarana dan Sarana Perdesaan',
            ],

            [
                'number' => '400.10.6.4',
                'description' => 'Fasilitasi Pemetaan Kebutuhan dan Pengkajian Teknologi Perdesaan',
            ],

            [
                'number' => '400.10.6.5',
                'description' => 'Pemasyarakatan dan Kerjasama Teknologi Perdesaan',
            ],

            [
                'number' => '400.10.7',
                'description' => 'Badan Usaha Milik Desa (BUMDes)',
            ],

            [
                'number' => '400.11',
                'description' => 'Pertamanan dan Pemakaman',
            ],

            [
                'number' => '400.11.3',
                'description' => 'Pemakaman',
            ],

            [
                'number' => '400.11.3.3',
                'description' => 'Pelayanan Pemakaman',
            ],

            [
                'number' => '400.12',
                'description' => 'Kependudukan dan Catatan Sipil',
            ],

            [
                'number' => '400.13',
                'description' => 'Keluarga Berencana',
            ],

            [
                'number' => '400.14',
                'description' => 'Hubungan Masyarakat',
            ],

            // 500 – Perekonomian

            [
                'number' => '500',
                'description' => 'Perekonomian',
            ],

            [
                'number' => '500.1',
                'description' => 'Pertanian dan Pangan',
            ],

            [
                'number' => '500.1.1',
                'description' => 'Penyiapan Perumusan Kebijakan',
            ],

            [
                'number' => '500.1.2',
                'description' => 'Pelaksanaan Kebijakan, Pelaksanaan Pembinaan Umum',
            ],

            [
                'number' => '500.1.5',
                'description' => 'Pelaksanaan Pemantauan, Evaluasi dan Pelaporan',
            ],

            [
                'number' => '500.1.6',
                'description' => 'Pemberian Bimbingan Teknis dan Supervisi Sinkronisasi',
            ],

            [
                'number' => '500.2',
                'description' => 'Perindustrian dan Perdagangan',
            ],

            [
                'number' => '500.2.2',
                'description' => 'Pelaksanaan Kebijakan, Pelaksanaan Pembinaan Umum',
            ],

            [
                'number' => '500.2.5',
                'description' => 'Pelaksanaan Pemantauan, Evaluasi dan Pelaporan',
            ],

            [
                'number' => '500.3',
                'description' => 'Koperasi, Usaha Kecil dan Menengah dan Penanaman Modal',
            ],

            [
                'number' => '500.3.2',
                'description' => 'Pelaksanaan Kebijakan, Pelaksanaan Pembinaan Umum',
            ],

            [
                'number' => '500.3.3',
                'description' => 'Pelaksanaan Koordinasi dan Fasilitasi Sinkronisasi serta Harmonisasi Pembangunan Daerah di Bidang Koperasi, Usaha Kecil dan Menengah, dan Penanaman Modal',
            ],

            [
                'number' => '500.3.6',
                'description' => 'Pelaksanaan Pemantauan, Evaluasi dan Pelaporan',
            ],

            [
                'number' => '500.3.7',
                'description' => 'Pemberian Bimbingan Teknis dan Supervisi Sinkronisasi',
            ],

            [
                'number' => '500.5',
                'description' => 'Kelautan dan Perikanan',
            ],

            [
                'number' => '500.5.2',
                'description' => 'Perikanan Tangkap',
            ],

            [
                'number' => '500.5.3',
                'description' => 'Perikanan Budidaya',
            ],

            [
                'number' => '500.5.4',
                'description' => 'Penguatan Daya Saing Produk Kelautan dan Perikanan',
            ],

            [
                'number' => '500.9',
                'description' => 'Pariwisata',
            ],

            [
                'number' => '500.9.2',
                'description' => 'Pelaksanaan Kebijakan dan Pembinaan Umum',
            ],

            [
                'number' => '500.9.5',
                'description' => 'Pelaksanaan Pemantauan, Evaluasi dan Pelaporan',
            ],

            [
                'number' => '500.11',
                'description' => 'Ketenagakerjaan dan Transmigrasi',
            ],

            [
                'number' => '500.11.2',
                'description' => 'Pelaksanaan Kebijakan, Pelaksanaan Pembinaan Umum',
            ],

            [
                'number' => '500.11.5',
                'description' => 'Pelaksanaan Pemantauan, Evaluasi dan Pelaporan',
            ],

            // 600 – Pekerjaan Umum dan Ketenagaan.

            [
                'number' => '600',
                'description' => 'Pekerjaan Umum dan Ketenagaan',
            ],

            [
                'number' => '600.1',
                'description' => 'Pekerjaan Umum',
            ],

            [
                'number' => '600.1.4',
                'description' => 'Pengelolaan Sumber Daya Air',
            ],

            [
                'number' => '600.1.4.2',
                'description' => 'Pengelolaan Irigasi dan Rawa',
            ],

            [
                'number' => '600.1.4.3',
                'description' => 'Pengelolaan Bendungan, Danau, Situ, dan Embung',
            ],

            [
                'number' => '600.1.4.4',
                'description' => 'Pengelolaan Air Tanah dan Air Baku',
            ],

            [
                'number' => '600.1.5',
                'description' => 'Operasi dan Pemeliharaan Sumber Daya Air',
            ],

            [
                'number' => '600.1.5.2',
                'description' => 'Operasi dan Pemeliharaan Irigasi dan Rawa',
            ],

            [
                'number' => '600.1.7',
                'description' => 'Pengembangan Jaringan Jalan',
            ],

            [
                'number' => '600.1.8',
                'description' => 'Pembangunan Jalan',
            ],

            [
                'number' => '600.1.9',
                'description' => 'Preservasi Jalan',
            ],

            [
                'number' => '600.1.13',
                'description' => 'Keterpaduan Infrastruktur Permukiman',
            ],

            [
                'number' => '600.1.14',
                'description' => 'Pengembangan Kawasan Permukiman',
            ],

            [
                'number' => '600.1.14.3',
                'description' => 'Kawasan Permukiman Pedesaan',
            ],

            [
                'number' => '600.1.16',
                'description' => 'Pengembangan Sistem Penyediaan Air Minum',
            ],

            [
                'number' => '600.1.16.3',
                'description' => 'Sistem Penyediaan Air Minum Pedesaan',
            ],

            [
                'number' => '600.1.17',
                'description' => 'Pengembangan Penyehatan Lingkungan Permukiman',
            ],

            [
                'number' => '600.1.17.2',
                'description' => 'Pengelolaan Air Limbah',
            ],

            [
                'number' => '600.1.17.3',
                'description' => 'Pengelolaan Persampahan',
            ],

            [
                'number' => '600.2',
                'description' => 'Perumahan Rakyat dan Kawasan Pemukiman',
            ],

            [
                'number' => '600.2.7',
                'description' => 'Penyediaan Rumah Khusus',
            ],

            [
                'number' => '600.2.7.4',
                'description' => 'Penyelenggaraan Bantuan Rumah Swadaya',
            ],

            [
                'number' => '600.2.7.6',
                'description' => 'Fasilitasi Backlog Rumah Swadaya dan Rumah Tidak Layak Huni',
            ],

            [
                'number' => '600.2.18',
                'description' => 'Pengembangan Kawasan Perkotaan',
            ],

            [
                'number' => '600.2.18.3',
                'description' => 'Pengembangan Infrastruktur Kawasan Kota Kecil dan Pedesaan',
            ],

            [
                'number' => '600.3',
                'description' => 'Tata Ruang (Tata Kota)',
            ],

            [
                'number' => '600.3.3',
                'description' => 'Pemanfaatan dan Pengendalian',
            ],

            [
                'number' => '600.3.3.2',
                'description' => 'Ijin Pemanfaatan Ruang',
            ],

            [
                'number' => '600.3.4',
                'description' => 'Pemetaan',
            ],

            [
                'number' => '600.3.4.1',
                'description' => 'Peta Dasar',
            ],

            [
                'number' => '600.3.4.2',
                'description' => 'Survey Pemetaan Ruang Darat',
            ],

            [
                'number' => '600.4',
                'description' => 'Lingkungan Hidup',
            ],

            [
                'number' => '600.4.2',
                'description' => 'Perencanaan Pemanfaatan Sumber Daya Alam dan Lingkungan Hidup',
            ],

            [
                'number' => '600.4.2.1',
                'description' => 'Inventarisasi, Penerapan Ekoregion, dan Rencana Perlindungan dan Pengelolaan Lingkungan',
            ],

            [
                'number' => '600.4.3',
                'description' => 'Penerapan Kebijakan Wilayah dan Sektor',
            ],

            [
                'number' => '600.4.5',
                'description' => 'Dampak Lingkungan',
            ],

            [
                'number' => '600.4.6',
                'description' => 'Pemantauan dan Pengawasan',
            ],

            [
                'number' => '600.4.8',
                'description' => 'Keanekaragaman Hayati dan Pengendalian Kerusakan Lahan',
            ],

            [
                'number' => '600.4.10',
                'description' => 'Mitigasi dan Pelestarian Fungsi Atmosfer',
            ],

            [
                'number' => '600.4.11',
                'description' => 'Adaptasi Perubahan Iklim',
            ],

            [
                'number' => '600.4.15',
                'description' => 'Pengelolaan Sampah',
            ],

            // 700 – Pengawasan

            [
                'number' => '700',
                'description' => 'Pengawasan',
            ],

            [
                'number' => '700.1',
                'description' => 'Pengawasan Internal',
            ],

            [
                'number' => '700.1.2',
                'description' => 'Pelaksanaan Pengawasan',
            ],

            [
                'number' => '700.1.2.1',
                'description' => 'Laporan Hasil Audit (LHA), Laporan Hasil Pemeriksaan (LHP), Laporan Hasil Pemeriksaan Operasional (LHPO), Laporan Hasil Evaluasi (LHE), Laporan Akuntan (LA), Laporan Auditor Independen (LAI) yang Memerlukan Tindak Lanjut (TL)',
            ],

            [
                'number' => '700.1.2.2',
                'description' => 'Laporan Hasil Audit Investigasi (LHAI) yang Mengandung Unsur Tindak Pidana Korupsi (TPK) dan Memerlukan Tindak Lanjut',
            ],

            [
                'number' => '700.1.2.4',
                'description' => 'Laporan Perkembangan Penanganan Surat Pengaduan Masyarakat',
            ],

            [
                'number' => '700.1.2.5',
                'description' => 'Laporan Pemutakhiran Data Tindak Lanjut Temuan',
            ],

            [
                'number' => '700.1.2.7',
                'description' => 'Laporan Hasil Monitoring dan Evaluasi',
            ],

            [
                'number' => '700.1.2.8',
                'description' => 'Laporan Kegiatan Pendampingan Penyusunan Laporan Keuangan dan Review',
            ],

            // 800 – Kepegawaian

            [
                'number' => '800',
                'description' => 'Kepegawaian',
            ],

            [
                'number' => '800.1',
                'description' => 'Sumber Daya Manusia',
            ],

            [
                'number' => '800.1.3',
                'description' => 'Mutasi Pegawai',
            ],

            [
                'number' => '800.1.4',
                'description' => 'Pengembangan Karier',
            ],

            [
                'number' => '800.1.6',
                'description' => 'Kompetensi',
            ],

            [
                'number' => '800.1.6.1',
                'description' => 'Pendidikan dan Pelatihan',
            ],

            [
                'number' => '800.1.6.2',
                'description' => 'Kursus dan Penataran',
            ],

            [
                'number' => '800.1.7',
                'description' => 'Penilaian Kinerja Pegawai',
            ],

            [
                'number' => '800.1.8',
                'description' => 'Disiplin Pegawai',
            ],

            [
                'number' => '800.1.9',
                'description' => 'Sistem Informasi Kepegawaian',
            ],

            [
                'number' => '800.1.9.1',
                'description' => 'Pengolahan Data dan Informasi Kepegawaian',
            ],

            [
                'number' => '800.1.10',
                'description' => 'Pengawasan dan Pengendalian',
            ],

            [
                'number' => '800.1.11',
                'description' => 'Administrasi Pegawai',
            ],

            [
                'number' => '800.1.11.1',
                'description' => 'Surat Perintah Dinas / Surat Tugas',
            ],

            [
                'number' => '800.1.11.2',
                'description' => 'Cuti Sakit',
            ],

            [
                'number' => '800.1.11.3',
                'description' => 'Cuti Bersalin',
            ],

            [
                'number' => '800.1.11.4',
                'description' => 'Cuti Tahunan',
            ],

            [
                'number' => '800.1.11.5',
                'description' => 'Cuti Alasan Penting',
            ],

            [
                'number' => '800.1.11.6',
                'description' => 'Cuti Besar',
            ],

            [
                'number' => '800.1.11.7',
                'description' => 'Cuti di Luar Tanggungan Negara',
            ],

            [
                'number' => '800.1.11.8',
                'description' => 'Kartu Pegawai / Kartu Pegawai Elektronik / Kartu Istri / Kartu Suami',
            ],

            [
                'number' => '800.1.11.9',
                'description' => 'Keanggotaan Organisasi Profesi / Kedinasan',
            ],

            [
                'number' => '800.1.11.10',
                'description' => 'Laporan Pajak Penghasilan Pribadi',
            ],

            [
                'number' => '800.1.11.11',
                'description' => 'Keterangan Penerimaan Pembayaran Penghasilan Pegawai',
            ],

            [
                'number' => '800.1.11.12',
                'description' => 'Daftar Urut Kepangkatan',
            ],

            [
                'number' => '800.1.11.13',
                'description' => 'Pengurusan Kenaikan Gaji Berkala, Mutasi Gaji / Tunjangan',
            ],

            [
                'number' => '800.1.12',
                'description' => 'Kesejahteraan Pegawai',
            ],

            [
                'number' => '800.1.12.2',
                'description' => 'Asuransi Pegawai / BPJS',
            ],

            [
                'number' => '800.1.12.3',
                'description' => 'Tabungan Perumahan',
            ],

            [
                'number' => '800.1.12.4',
                'description' => 'Bantuan Sosial',
            ],

            [
                'number' => '800.1.12.5',
                'description' => 'Pakaian Dinas',
            ],

            [
                'number' => '800.1.12.6',
                'description' => 'Layanan Pegawai yang Meninggal Karena Dinas',
            ],

            [
                'number' => '800.1.12.7',
                'description' => 'Pemberian Tali Kasih',
            ],

            [
                'number' => '800.1.12.8',
                'description' => 'Pemberian Piagam Penghargaan dan Tanda Jasa',
            ],

            [
                'number' => '800.1.13',
                'description' => 'Administrasi Perseorangan',
            ],

            [
                'number' => '800.1.13.1',
                'description' => 'Pegawai Negeri Sipil (PNS)',
            ],

            [
                'number' => '800.1.13.2',
                'description' => 'Pegawai Pemerintah dengan Perjanjian Kerja (PPPK)',
            ],

            // 900 – Keuangan

            [
                'number' => '900',
                'description' => 'Keuangan',
            ],

            [
                'number' => '900.1',
                'description' => 'Anggaran Pendapatan dan Belanja Daerah (APBD)',
            ],

            [
                'number' => '900.1.1',
                'description' => 'Penyusunan Anggaran',
            ],

            [
                'number' => '900.1.2',
                'description' => 'Pelaksanaan Anggaran',
            ],

            [
                'number' => '900.1.3',
                'description' => 'Perubahan Anggaran',
            ],

            [
                'number' => '900.1.4',
                'description' => 'Pertanggungjawaban Pelaksanaan Anggaran',
            ],

            [
                'number' => '900.2',
                'description' => 'Akuntansi dan Pelaporan Keuangan',
            ],

            [
                'number' => '900.2.2',
                'description' => 'Laporan Keuangan',
            ],

            [
                'number' => '900.2.3',
                'description' => 'Pertanggungjawaban Keuangan',
            ],

            [
                'number' => '900.7',
                'description' => 'Perbendaharaan',
            ],

            [
                'number' => '900.7.3',
                'description' => 'Pertanggungjawaban Bendahara',
            ],

            [
                'number' => '900.9',
                'description' => 'Dana Transfer dan Bantuan Keuangan',
            ],

            [
                'number' => '900.9.1',
                'description' => 'Dana Transfer',
            ],

            [
                'number' => '900.9.2',
                'description' => 'Bantuan Keuangan',
            ],
           
        ];

        foreach ($data as $item) {
            Klasifikasi::updateOrCreate(
                ['number' => $item['number']],
                ['description' => $item['description']]
            );
        }
    }
}