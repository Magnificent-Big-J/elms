<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = \Faker\Factory::create();
            \App\User::create([
                'name'=>'Mike',
                'surname'=>'Ward Councilor',
                'gender'=>'Male',
                'contact_number'=>$fake->phoneNumber,
                'address'=>$fake->address,
                'postal_code'=>$fake->postcode,
                'type'=>'ward',
                'password'=>bcrypt('secret'),
                'email'=>'mike@elms.org',
                'ward_no'=>1

            ]);
        \App\User::create([
            'name'=>'Dinini',
            'surname'=>'Modiba',
            'gender'=>'Female',
            'contact_number'=>$fake->phoneNumber,
            'address'=>$fake->address,
            'postal_code'=>$fake->postcode,
            'type'=>'ward',
            'password'=>bcrypt('secret'),
            'email'=>'dinini@elms.org',
            'ward_no'=>2

        ]);

        \App\User::create([
            'name'=>'Grace',
            'surname'=>'Tshabalala',
            'gender'=>'Female',
            'contact_number'=>$fake->phoneNumber,
            'address'=>$fake->address,
            'postal_code'=>$fake->postcode,
            'type'=>'employee',
            'password'=>bcrypt('secret'),
            'email'=>'grace.tshabza@elms.org',
            'call_type_id'=>1

        ]);
        \App\User::create([
            'name'=>'Eric',
            'surname'=>'Chauke',
            'gender'=>'Male',
            'contact_number'=>$fake->phoneNumber,
            'address'=>$fake->address,
            'postal_code'=>$fake->postcode,
            'type'=>'employee',
            'password'=>bcrypt('secret'),
            'email'=>'eric.chauke@elms.org',
            'call_type_id'=>2

        ]);
        \App\User::create([
            'name'=>'Drucilla',
            'surname'=>'Cleote',
            'gender'=>'Female',
            'contact_number'=>$fake->phoneNumber,
            'address'=>$fake->address,
            'postal_code'=>$fake->postcode,
            'type'=>'employee',
            'password'=>bcrypt('secret'),
            'email'=>'dru.cloete@elms.org',
            'call_type_id'=>3

        ]);
        \App\User::create([
            'name'=>'Shawn',
            'surname'=>'Mocke',
            'gender'=>'Male',
            'contact_number'=>$fake->phoneNumber,
            'address'=>$fake->address,
            'postal_code'=>$fake->postcode,
            'type'=>'employee',
            'password'=>bcrypt('secret'),
            'email'=>'shawn.mocke@elms.org',
            'call_type_id'=>4

        ]);

            \App\User::create([
            'name'=>'John',
            'surname'=>'Doe',
            'gender'=>'Male',
            'contact_number'=>$fake->phoneNumber,
            'address'=>$fake->address,
            'postal_code'=>$fake->postcode,
            'type'=>'residence',
            'password'=>bcrypt('secret'),
            'email'=>'john.doe@gmail.com',
            'ward_no'=>1

        ]);
        \App\User::create([
            'name'=>'Elisa',
            'surname'=>'Mopeli',
            'gender'=>'Female',
            'contact_number'=>$fake->phoneNumber,
            'address'=>$fake->address,
            'postal_code'=>$fake->postcode,
            'type'=>'residence',
            'password'=>bcrypt('secret'),
            'email'=>'elisa.mopeli@gmail.com',
            'ward_no'=>2

        ]);
    }
}
