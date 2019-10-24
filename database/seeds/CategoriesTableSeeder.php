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
        $names = [
            'Alimentacion',
            'Transporte',
            'Arriendo',
            'Energia Electrica',
            'Acueducto',
            'Internet',
            'Teléfono',
            'Televisión',
            'Netflix',
            'Ropa'
        ];

        foreach ($names as $name){
            $category = \App\Category::create(['name' => $name]);
        }
    }
}
