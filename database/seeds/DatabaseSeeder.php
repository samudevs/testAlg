<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 100)->create()->each(function ($u) {
        	for ($i = 0; $i< rand(0,5); $i++) 
        	$u->createRelation(User::inRandomOrder()->first()->id);
        });
    }


}
