<?php

use Illuminate\Database\Seeder;

class GenerateBankAndMarketplace extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank')->insert([
        	['nama_bank'=>'BNI'],
        	['nama_bank'=>'BRI'],
        	['nama_bank'=>'BTN'],
        	['nama_bank'=>'MEGA'],
        	['nama_bank'=>'BCA'],
        	['nama_bank'=>'MANDIRI'],
        	['nama_bank'=>'DANAMON'],
        	['nama_bank'=>'BNI SYARIAH'],
        	['nama_bank'=>'BRI SYARIAH'],
        	['nama_bank'=>'MANDIRI SYARIAH'],
        ]);
        DB::table('marketplace')->insert([
        	['nama'=>'Tokopedia'],
        	['nama'=>'Lazada'],
        	['nama'=>'JD.ID'],
        	['nama'=>'Bukalapak'],
        	['nama'=>'Zalora'],
        	['nama'=>'Matahari'],
        ]);
    }
}
