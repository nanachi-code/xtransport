<?php

use App\User;
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
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Nanachi',
            'email'    => 'dinhvu2509@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'super_admin'
        ));
        // $this->call(UserSeeder::class);
    }
}
