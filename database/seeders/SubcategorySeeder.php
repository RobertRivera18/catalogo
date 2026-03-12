<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            [
                'category_id' => 1,
                'name' => 'Celulares y SmarthPhone',
                'slug' => Str::slug('Celulares y SmarthPhone'),
                'color' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Accesorios para Celular',
                'slug' => Str::slug('Accesorios para Celular')
            ],

            [
                'category_id' => 1,
                'name' => 'Smartwatch',
                'slug' => Str::slug('Smartwatch')
            ],

            //TV ,Audio y Video

            [
                'category_id' => 2,
                'name' => 'TV y Audio',
                'slug' => Str::slug('TV y Audio'),
            ],


            [
                'category_id' => 2,
                'name' => 'Audios',
                'slug' => Str::slug('Audios'),
            ],

            [
                'category_id' => 2,
                'name' => 'Audios para autos',
                'slug' => Str::slug('Audios para autos'),
            ],

            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),
            ],

            [
                'category_id' => 3,
                'name' => 'Play Station',
                'slug' => Str::slug('Play Station'),
            ],

            [
                'category_id' => 3,
                'name' => 'videojuego para PC',
                'slug' => Str::slug('videojuego para PC'),
            ],


            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
            ],

            //Computacion
            [
                'category_id' => 4,
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),
            ],
            [
                'category_id' => 4,
                'name' => 'Pc Escritorio',
                'slug' => Str::slug('Pc Escritorio'),
            ],
            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
            ],

            [
                'category_id' => 4,
                'name' => 'Accesorios de Computadora',
                'slug' => Str::slug('Accesorios de Computadora'),
            ],

            //Moda

            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                 'color'=>true,
                 'size'=> true
            ],
            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                 'color'=>true,
                 'size'=> true
            ],
            [
                'category_id' => 5,
                'name' => 'Lentes y Gafas',
                'slug' => Str::slug('Lentes y Gafas'),
            ],
            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes'),
            ],
        ];
        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}
