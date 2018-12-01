<?php

use Illuminate\Database\Seeder;

class CallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $num_calls = \App\CallTypes::count();
         $residence = \App\User::where('type','residence')->get();
         $reason = null;

         for ($i = 1; $i <= $num_calls; $i++){
             foreach ($residence as $res) {
                    $call = rand(1,$num_calls);
                    switch ($call){
                        case 1:
                            $reasons = array("Water leakage on my tap","Water flowing on the roads","No water for 6 days","Children playing with water");
                            $rsel = rand(0,3);
                            $reason = $reasons[$rsel];
                            break;
                        case 2:
                            $reasons = array("No Electricity in my house","Elecric box burned","Cable theft two three away","Cables lying down, please fix them for the sake of safety");
                            $rsel = rand(0,3);
                            $reason = $reasons[$rsel];
                            break;
                        case 3:
                            $reasons = array("There's a blockage in my house","Our street is facing sewage blockage","New sewage system is required","The club house sewage has leakage that makes the whole block smell");
                            $rsel = rand(0,3);
                            $reason = $reasons[$rsel];
                            break;
                        case 4:
                            $reasons = array("There's a pothole at my gate","Pothole next to community center has not been fixed till to this day","Main street has 12 potholes, please fix it","We need to see the ward councilor in regards to service of potholes being poor");
                            $rsel = rand(0,3);
                            $reason = $reasons[$rsel];
                            break;
                    }
                    \App\Calls::create([
                        'call_type_id'=>$call,
                        'user_id'=>$res->id,
                        'reason'=>$reason,
                        'call_date'=>\Carbon\Carbon::now()
                    ]);


                }

         }



    }
}
