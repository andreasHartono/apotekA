<?php

use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            'medicines_name' => 'amitriptilin',
            'medicines_form' => 'tab 25 mg',
            'medicines_formula' => '60 tab/bulan.',
            'description' => '',
            'faskes_1' => true,
            'faskes_2' => true,
            'faskes_3' => true,
            'medicines_price' => 75000,
            'category_id' => 3
        ]);

        DB::table('medicines')->insert([
            'medicines_name' => 'sertralin',
            'medicines_form' => 'tab sal 25 mg',
            'medicines_formula' => '30 tab/bulan.',
            'description' => 'Digunakan untuk depresi yang 
            disertai ansietas.',
            'faskes_1' => false,
            'faskes_2' => true,
            'faskes_3' => true,
            'medicines_price' => 100000,
            'category_id' => 3
        ]);

        DB::table('medicines')->insert([
            'medicines_name' => 'flufenazin',
            'medicines_form' => 'inj 25 mg/mL (i.m.)',
            'medicines_formula' => '1 amp/ 2 minggu',
            'description' => 'Hanya untuk rumatan pada pasien skizofrenia.',
            'faskes_1' => false,
            'faskes_2' => true,
            'faskes_3' => true,
            'medicines_price' => 50000,
            'category_id' => 4
        ]);

        DB::table('medicines')->insert([
            'medicines_name' => 'trifluoperazin',
            'medicines_form' => 'tab sal selaput 5 mg',
            'medicines_formula' => '90 tab/bulan.',
            'description' => 'Hanya dapat diresepkan oleh Dokter Spesialis Kedokteran Jiwa.',
            'faskes_1' => false,
            'faskes_2' => true,
            'faskes_3' => true,
            'medicines_price' => 200000,
            'category_id' => 4
        ]);
    }
}