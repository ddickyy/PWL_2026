<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 3, 'pembeli' => 'Andi', 'penjualan_kode' => 'P001', 'penjualan_tanggal' => '2026-03-10'],
            ['penjualan_id' => 2, 'user_id' => 3, 'pembeli' => 'Budi', 'penjualan_kode' => 'P002', 'penjualan_tanggal' => '2026-03-11'],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Citra', 'penjualan_kode' => 'P003', 'penjualan_tanggal' => '2026-03-12'],
            ['penjualan_id' => 4, 'user_id' => 3, 'pembeli' => 'Dewi', 'penjualan_kode' => 'P004', 'penjualan_tanggal' => '2026-03-13'],
            ['penjualan_id' => 5, 'user_id' => 3, 'pembeli' => 'Eka', 'penjualan_kode' => 'P005', 'penjualan_tanggal' => '2026-03-14'],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Fajar', 'penjualan_kode' => 'P006', 'penjualan_tanggal' => '2026-03-15'],
            ['penjualan_id' => 7, 'user_id' => 3, 'pembeli' => 'Gina', 'penjualan_kode' => 'P007', 'penjualan_tanggal' => '2026-03-16'],
            ['penjualan_id' => 8, 'user_id' => 3, 'pembeli' => 'Hadi', 'penjualan_kode' => 'P008', 'penjualan_tanggal' => '2026-03-17'],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Intan', 'penjualan_kode' => 'P009', 'penjualan_tanggal' => '2026-03-18'],
            ['penjualan_id' => 10, 'user_id' => 3, 'pembeli' => 'Joko', 'penjualan_kode' => 'P010', 'penjualan_tanggal' => '2026-03-19'],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
