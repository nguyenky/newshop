<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(['name'=>'admin','email'=>'admin@gmail.com','password' => bcrypt('123123'),'role'=>1]);
    }
}
