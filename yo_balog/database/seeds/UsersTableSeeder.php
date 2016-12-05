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
        \App\Model\User::create([
            'name' => 'root',
            'email' => 'root@com.tw',
            'password' => Hash::make('123456'),
            'type' => '1',
        ]);
    }
}
