<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories=
            [
                ['name'=>'Category 1','desc'=>'Desc Category 1 ','slug'=>'Category 1','image'=>'image.png'],
                ['name'=>'Category 2','desc'=>'Desc Category 2 ','slug'=>'Category 2','image'=>'image.png'],
                ['name'=>'Category 3','desc'=>'Desc Category 3 ','slug'=>'Category 3','image'=>'image.png'],
                ['name'=>'Category 4','desc'=>'Desc Category 4 ','slug'=>'Category 4','image'=>'image.png'],
                ['name'=>'Category 5','desc'=>'Desc Category 5 ','slug'=>'Category 5','image'=>'image.png'],
            ];


        foreach ($categories as $category)
        {
            Category::create($category);
        }

    }
}
