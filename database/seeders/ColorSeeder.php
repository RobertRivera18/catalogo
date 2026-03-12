<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors=['blanco','azul','rojo','negro'];
        foreach ($colors as $color) {
            Color::create([
                'name'=>$color,
            ]);
        }
     }
}
