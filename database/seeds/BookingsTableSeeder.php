<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_bookings = \App\BookingType::count();
        $residence = \App\User::where('type','residence')->get();
        $reason = null;

        for ($i = 1; $i <= $num_bookings; $i++){
            foreach ($residence as $res) {
                $call = rand(1,$num_bookings);
                switch ($call){
                    case 1:

                        $address = $res->address;
                        break;
                    case 2:

                        $address = "Community Center";
                        break;

                }
                \App\Booking::create([
                    'booking_type_id'=>$call,
                    'user_id'=>$res->id,
                    'address'=>$address,
                    'start_date'=>\Carbon\Carbon::now(),
                    'end_date'=>\Carbon\Carbon::now(),
                ]);


            }

        }
    }
}
