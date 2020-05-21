<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VolunteerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('volunteers')->insert([
            'name' => 'Mg Aung',
            'dob' => '3/4/1990',
            'nrc' => '12/AbCdEf(N)193456',
            'address' => 'Yangon',
            'ph_no' => '0912345678',
            'center_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('volunteers')->insert([
            'name' => 'Aung Maung',
            'dob' => '12/9/1990',
            'nrc' => '12/AbCdEf(N)754321',
            'address' => 'Yangon',
            'ph_no' => '0912345678',
            'center_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('volunteers')->insert([
            'name' => 'Aung Zaw',
            'dob' => '3/1/1995',
            'nrc' => '12/AbCdEf(N)723578',
            'address' => 'Yangon',
            'ph_no' => '0912345678',
            'center_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
