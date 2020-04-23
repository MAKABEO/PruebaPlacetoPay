<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Vegetales';
        $category->save();

        $category = new Category();
        $category->name = 'Frutas';
        $category->save();

        $category = new Category();
        $category->name = 'Jugos';
        $category->save();

        $category = new Category();
        $category->name = 'Secos';
        $category->save();
    }
}
