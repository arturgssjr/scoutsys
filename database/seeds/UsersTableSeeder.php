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
        factory(\scoutsys\Models\User::class)->create([
            'email' => 'admin@scoutsys.com'
        ]);
    }
}
