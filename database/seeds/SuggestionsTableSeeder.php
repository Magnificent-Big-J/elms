<?php

use Illuminate\Database\Seeder;

class SuggestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $residence = \App\User::where('type','residence')->get();
        $i = 0;
        foreach ($residence as $res){

            $projects = array("Children's Park","CPF");
            $motivations = array("New environment for children's play is a requirement","Crime protection forum for the community");
            \App\Suggestion::create([
                'name'=>$projects[$i],
                'motivation'=> $motivations[$i],
                'suggestion_date'=>\Carbon\Carbon::now(),
                'user_id'=>$res->id
            ]);

            $i++;
        }
    }
}
