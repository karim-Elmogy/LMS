<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('courses')->delete();
        $courses=
            [
                [
                    'name'=>'Course 1',
                    'description'=>'Et natus culpa, ut u. Et natus culpa, ut u. Et natus culpa, ut u. ',
                    'short_description'=>'Ad delectus necessi',
                    'section'=>1,
                    'image'=>'1',
                    'requirements'=>"Quo nemo molestiae q",
                    'video_url'=>'https://www.youtube.com/results?search_query=how+t...',
                    'course_overview_provider'=>'youtube',
                    'meta_keywords'=>'Enim',
                    'meta_description'=>'Enim ut corrupti ex',
                    'is_free_course'=>null,
                    'status'=>1,
                    'is_top_course'=>1,
                    'price'=>750,
                    'discount_price'=>100,
                    'category_id'=>1,
                    'sub_category_id'=>2,
                    'user_id'=>13,
                    'multi_instructor'=>0,
                    'language'=>'english',
                    'level'=>'beginner',
                ],

                [
                    'name'=>'Course 2',
                    'description'=>'description',
                    'short_description'=>'Ad delectus necessi',
                    'section'=>1,
                    'image'=>'1',
                    'requirements'=>"Quo nemo molestiae q",
                    'video_url'=>'https://www.youtube.com/results?search_query=how+t...',
                    'course_overview_provider'=>'youtube',
                    'meta_keywords'=>'Enim',
                    'meta_description'=>'Enim ut corrupti ex',
                    'is_free_course'=>null,
                    'status'=>1,
                    'is_top_course'=>1,
                    'price'=>750,
                    'discount_price'=>100,
                    'category_id'=>2,
                    'sub_category_id'=>2,
                    'user_id'=>13,
                    'multi_instructor'=>13,
                    'language'=>'english',
                    'level'=>'beginner',
                ],

            ];


        foreach ($courses as $course)
        {
            Course::create($course);
        }

    }
}
