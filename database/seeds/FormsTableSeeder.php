<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        for($i=0;$i<50;$i++)
        DB::table('forms')->insert([
            'coinname' => 'Test'.Str::random(10),
            'coinprice' => mt_rand(1,100),
            'radio' => 'port',
            'dropdown' => 'intermediate',
            'checkbox' => 'coinbase',
            'created_at' => $dateNow,
            'updated_at' => $dateNow

        ]);
    }
}
