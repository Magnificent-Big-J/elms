<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = array(array('description'=>'Subsidies'),array('description'=>'Plan approval for house upgrading'));
        $meetings = array(array('description'=>'Funerals'),array('description'=>'Community meetings'),array('description'=>'Project Issuing'),array('description'=>'Potholes'));
        $bookings = array(array('description'=>'Funerals'),array('description'=>'Community meetings'));
        $calls = array(array('description'=>'Water'),array('description'=>'Electricity'),array('description'=>'Sewage '),array('description'=>'Potholes'));

        foreach ($plans as $plan){
            \App\PlanType::create($plan);
        }
        foreach ($meetings as $meeting){
            \App\MeetingType::create($meeting);
        }
        foreach ($bookings as $booking){
            \App\BookingType::create($booking);
        }
        foreach ($calls as $call){
            \App\CallTypes::create($call);
        }
    }
}
