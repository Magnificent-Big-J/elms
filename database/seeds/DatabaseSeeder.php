<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(BudgetsTableSeeder::class);
        $this->call(CallsTableSeeder::class);
        $this->call(MeetingsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(SuggestionsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(plansTableSeeder::class);


    }
}
