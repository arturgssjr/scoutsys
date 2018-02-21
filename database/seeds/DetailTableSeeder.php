<?php

use Illuminate\Database\Seeder;

class DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\scoutsys\Models\Detail::class, 10)->create();
    }
}
