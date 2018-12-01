<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            $projects = array("Fixing Tire Roads","New Community Complex");
            $descriptions = array("There are many potholes in the community that needs to be taken care of!!!","People of Emalahleni Community they travel far for shopping, this project is meant to bring shopping closer to the community");

            for($i =0; $i<2; $i++){
                \App\Projects::create([
                    'project_name'=>$projects[$i],
                    'description'=>$descriptions[$i],
                    'start_date'=>\Carbon\Carbon::now()->addDay(rand(2,4)),
                    'end_date'=>\Carbon\Carbon::now()->addDay(rand(100,200))

                ]);
            }




    }
}
