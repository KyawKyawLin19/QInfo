<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'p_name' => 'Aung Aung',
            'dob' => '2/1/1990',
            'nrc' => '12/AbCdEf(N)123456',
            'address' => 'Yangon',
            'ph_no' => '0912345678',
            'center_id' => '1',
            'room_no' => 'A003',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('patients')->insert([
            'p_name' => 'Maung Maung',
            'dob' => '1/1/1990',
            'nrc' => '12/AbCdEf(N)654321',
            'address' => 'Yangon',
            'ph_no' => '0912345678',
            'center_id' => '2',
            'room_no' => 'A002',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('patients')->insert([
            'p_name' => 'Zaw Zaw',
            'dob' => '3/1/1990',
            'nrc' => '12/AbCdEf(N)123678',
            'address' => 'Yangon',
            'ph_no' => '0912345678',
            'center_id' => '1',
            'room_no' => 'A001',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
