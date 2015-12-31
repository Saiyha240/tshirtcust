<?php

use App\Tshirt;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TshirtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tshirts')->delete();

        Tshirt::create([
            'user_id' => '2',
            'name' => 'Tshirt 1',
            'data' => 'Data 1'
        ]);

        Tshirt::create([
            'user_id' => '2',
            'name' => 'Tshirt 2',
            'data' => 'Data 2'
        ]);

        Tshirt::create([
            'user_id' => '3',
            'name' => 'Tshirt 3',
            'data' => 'Data 3'
        ]);

        Tshirt::create([
            'user_id' => '3',
            'name' => 'Tshirt 4',
            'data' => 'Data 4'
        ]);
    }
}
