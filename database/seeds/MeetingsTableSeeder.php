<?php

use Illuminate\Database\Seeder;

class MeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_calls = \App\MeetingType::count();
        $faker = \Faker\Factory::create();
        for($i = 1; $i<11; $i++){
            $addresses = array("Community Hall","Club House", $faker->address);
            $address = $addresses[rand(0,2)];
            $met_num = rand(1,$num_calls);
            \App\Meeting::create([
                'meeting_type_id'=>$met_num,
                'address'=>$address,
                'start_date'=>\Carbon\Carbon::now(),
                'end_date'=>\Carbon\Carbon::now(),
                'user_id'=>1
            ]);
        }
    }
}
