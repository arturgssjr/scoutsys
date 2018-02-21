<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Administrador'
        ]);
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Basquete'
        ]);
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Futebol'
        ]);
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Voleibol'
        ]);
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Handebol'
        ]);
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Tênis'
        ]);
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Tênis de Mesa'
        ]);
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Futebol de Areia'
        ]);
        factory(\scoutsys\Models\Category::class)->create([
            'description' => 'Futsal'
        ]);
    }
}
