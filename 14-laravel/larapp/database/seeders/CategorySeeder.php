<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cat = new Category;
        $cat->name = 'Nintendo Switch';
        $cat->image = 'image/switch.png';
        $cat->description = 'consola portable mas vendida del mercado';
        $cat->save();
        //
        $cat = new Category;
        $cat->name = 'Xbox Series';
        $cat->image = 'image/xboxseries.png';
        $cat->description = 'Consola mas potente y mas accesible';
        $cat->save();
        //
        $cat = new Category;
        $cat->name = 'PlayStation 5';
        $cat->image = 'image/ps5.png';
        $cat->description = 'Consola con potentes exclusivas';
        $cat->save();
        //
        $cat = new Category;
        $cat->name = 'PC';
        $cat->image = 'image/pc.png';
        $cat->description = 'PC Games';
        $cat->save();
    }
}
