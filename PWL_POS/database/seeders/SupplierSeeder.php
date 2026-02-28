<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['supplier_id' => 1, 'supplier_kode' => 'SUP001', 'supplier_nama' => 'PT. Sumber Makmur', 'supplier_alamat' => 'Jl. Merdeka No. 123, Jakarta'],
            ['supplier_id' => 2, 'supplier_kode' => 'SUP002', 'supplier_nama' => 'CV. Jaya Abadi', 'supplier_alamat' => 'Jl. Sudirman No. 456, Bandung'],
            ['supplier_id' => 3, 'supplier_kode' => 'SUP003', 'supplier_nama' => 'UD. Sejahtera', 'supplier_alamat' => 'Jl. Diponegoro No. 789, Surabaya']
        ];
        DB::table('m_supplier')->insert($data);
    }
}
