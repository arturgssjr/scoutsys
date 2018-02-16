<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\scoutsys\Models\Profile::class)->create([
            'name' => 'Administrador'
        ]);
        factory(\scoutsys\Models\Profile::class)->create([
            'name' => 'Treinador'
        ]);
        factory(\scoutsys\Models\Profile::class)->create([
            'name' => 'Jogador'
        ]);
    }
}
