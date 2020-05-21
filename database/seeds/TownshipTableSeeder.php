<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TownshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('townships')->insert([
            'name' => 'Botahtaung',
            'city_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('townships')->insert([
            'name' => 'Kyauktada',
            'city_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
