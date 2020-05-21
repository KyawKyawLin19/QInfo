<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('centers')->insert([
            'name' => 'Center1',
            'address' => 'No(10),bla bla Township,Yangon',
            'ph_no' => 12296788,
            'township_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('centers')->insert([
            'name' => 'Center2',
            'address' => 'No(11),bla bla Township,Yangon',
            'ph_no' => 12296796,
            'township_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('centers')->insert([
            'name' => 'Center3',
            'address' => 'No(12),bla bla Township,Yangon',
            'ph_no' => 99495954,
            'township_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('centers')->insert([
            'name' => 'Center4',
            'address' => 'No(13),bla bla Township,Yangon',
            'ph_no' => 88495954,
            'township_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
