<?php

use Illuminate\Database\Seeder;

class plansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_calls = \App\PlanType::count();
        $residence = \App\User::where('type','residence')->get();
        $reason = null;

        for ($i = 1; $i <= $num_calls; $i++){
            foreach ($residence as $res) {
                $call = rand(1,$num_calls);
                switch ($call){
                    case 1:
                        $reasons = array("There's some infrastructure of the community","New subsides communication planning");
                        $rsel = rand(0,1);
                        $reason = $reasons[$rsel];
                        break;
                    case 2:
                        $reasons = array("My house is very small I need an upgrade","Expansion of the garage for my newly added car");
                        $rsel = rand(0,1);
                        $reason = $reasons[$rsel];
                        break;

                }
                \App\Plans::create([
                    'plan_type_id'=>$call,
                    'user_id'=>$res->id,
                    'motivation'=>$reason,
                    'plan_date'=>\Carbon\Carbon::now()
                ]);


            }

        }

    }
}
