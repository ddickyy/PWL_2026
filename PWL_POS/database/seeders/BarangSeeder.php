<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Indomie Goreng', 'harga_beli' => 2000, 'harga_jual' => 3000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Beras Cap Topi Koki', 'harga_beli' => 10000, 'harga_jual' => 12000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'BRG003', 'barang_nama' => 'Teh Botol Sosro', 'harga_beli' => 3000, 'harga_jual' => 5000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'BRG004', 'barang_nama' => 'Aqua Galon', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'BRG005', 'barang_nama' => 'Pond\'s Age Miracle', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'BRG006', 'barang_nama' => 'Nivea Soft', 'harga_beli' => 30000, 'harga_jual' => 45000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'BRG007', 'barang_nama' => 'Panci Presto', 'harga_beli' => 200000, 'harga_jual' => 250000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'BRG008', 'barang_nama' => 'Set Alat Masak', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'BRG009', 'barang_nama' => 'Popok Bayi Merries', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'BRG010', 'barang_nama' => 'Susu Formula SGM', 'harga_beli' => 40000, 'harga_jual' => 60000],
            ['barang_id' => 11, 'kategori_id' => 1, 'barang_kode' => 'BRG011', 'barang_nama' => 'Mie Sedaap Goreng', 'harga_beli' => 2500, 'harga_jual' => 3500],
            ['barang_id' => 12, 'kategori_id' => 2, 'barang_kode' => 'BRG012', 'barang_nama' => 'Coca-Cola Botol', 'harga_beli' => 4000, 'harga_jual' => 6000],
            ['barang_id' => 13, 'kategori_id' => 3, 'barang_kode' => 'BRG013', 'barang_nama' => 'Vaseline Petroleum Jelly', 'harga_beli' => 20000, 'harga_jual' => 30000],
            ['barang_id' => 14, 'kategori_id' => 4, 'barang_kode' => 'BRG014', 'barang_nama' => 'Set Pisau Dapur', 'harga_beli' => 100000, 'harga_jual' => 150000],
            ['barang_id' => 15, 'kategori_id' => 5, 'barang_kode' => 'BRG015', 'barang_nama' => 'Tisu Basah MamyPoko', 'harga_beli' => 15000, 'harga_jual' => 25000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
