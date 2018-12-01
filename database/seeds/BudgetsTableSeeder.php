<?php

use Illuminate\Database\Seeder;

class BudgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Budgets::create([
            'year'=>2018,
            'allocated_amount'=>'1000000',
            'description'=>'Water Services'
        ]);
        \App\Budgets::create([
            'year'=>2018,
            'allocated_amount'=>'1000000',
            'description'=>'Electricity Services'
        ]);
        \App\Budgets::create([
            'year'=>2018,
            'allocated_amount'=>'1000000',
            'description'=>'Sewage Services'
        ]);\App\Budgets::create([
        'year'=>2018,
        'allocated_amount'=>'1000000',
        'description'=>'Potholes Services'
    ]);
    }
}
