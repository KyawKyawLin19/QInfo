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
            'township_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('centers')->insert([
            'name' => 'Center2',
            'township_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('centers')->insert([
            'name' => 'Center3',
            'township_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('centers')->insert([
            'name' => 'Center4',
            'township_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
