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
            'name' => 'Administrador',
            'email' => 'admin@scoutsys.com',
            'birth' => '1989-07-08',
            'nickname' => 'Admin',
            'permission' => 'app.admin',
            'password' => '123456'
        ]);
        factory(\scoutsys\Models\User::class)->create([
            'name' => 'Treinador 1',
            'email' => 'treinador1@scoutsys.com',
            'birth' => '1989-07-08',
            'nickname' => 'Coach 1',
            'permission' => 'app.coach',
            'password' => '123456'
        ]);
        factory(\scoutsys\Models\User::class)->create([
            'name' => 'Treinador 2',
            'email' => 'treinador2@scoutsys.com',
            'birth' => '1989-07-08',
            'nickname' => 'Coach 2',
            'permission' => 'app.coach',
            'password' => '123456'
        ]);
        factory(\scoutsys\Models\User::class)->create([
            'name' => 'Jogador 1',
            'email' => 'jogador1@scoutsys.com',
            'birth' => '1989-07-08',
            'nickname' => 'Player 1',
            'permission' => 'app.player',
            'password' => '123456'
        ]);
        factory(\scoutsys\Models\User::class)->create([
            'name' => 'Jogador 2',
            'email' => 'jogador2@scoutsys.com',
            'birth' => '1989-07-08',
            'nickname' => 'Player 2',
            'permission' => 'app.player',
            'password' => '123456'
        ]);
        factory(\scoutsys\Models\User::class)->create([
            'name' => 'Jogador 3',
            'email' => 'jogador3@scoutsys.com',
            'birth' => '1989-07-08',
            'nickname' => 'Player 3',
            'permission' => 'app.player',
            'password' => '123456'
        ]);
        factory(\scoutsys\Models\User::class)->create([
            'name' => 'Jogador 4',
            'email' => 'jogador4@scoutsys.com',
            'birth' => '1989-07-08',
            'nickname' => 'Player 4',
            'permission' => 'app.player',
            'password' => '123456'
        ]);

    }
}
