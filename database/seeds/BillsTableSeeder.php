<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residence = \App\User::where('type','residence')->get();

        foreach ($residence as $res){
            \App\Bills::create([
                'user_id'=>$res->id,
                'bill_month'=>\Carbon\Carbon::now()
            ]);
        }
    }
}
