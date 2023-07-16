<?php

namespace Database\Seeders;

use App\Models\Sub_Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub__categories')->delete();
        $Sub_categories=
            [
                ['name'=>'Sub-Category 1','desc'=>'Desc Sub-Category 1 ','slug'=>'Sub-Category 1','image'=>'image.png','category_id'=>'1'],
                ['name'=>'Sub-Category 2','desc'=>'Desc Sub-Category 2 ','slug'=>'Sub-Category 2','image'=>'image.png','category_id'=>'1'],
                ['name'=>'Sub-Category 3','desc'=>'Desc Sub-Category 3 ','slug'=>'Sub-Category 3','image'=>'image.png','category_id'=>'2'],
                ['name'=>'Sub-Category 4','desc'=>'Desc Sub-Category 4 ','slug'=>'Sub-Category 4','image'=>'image.png','category_id'=>'2'],
                ['name'=>'Sub-Category 5','desc'=>'Desc Sub-Category 5 ','slug'=>'Sub-Category 5','image'=>'image.png','category_id'=>'3']
            ];


        foreach ($Sub_categories as $Sub_category)
        {
            Sub_Category::create($Sub_category);
        }

    }
}
