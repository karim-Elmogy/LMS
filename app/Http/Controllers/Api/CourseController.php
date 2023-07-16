<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    use ApiResponseTrait;

    public function index(Request $request)
    {
        try {
//            $courses=Course::where(['category_id'=>$request->category_id,'sub_category_id'=>$request->sub_category_id])
//                ->select(['id','name','short_description','is_free_course','image'])->get();
            $courses=Course::where('category_id',$request->category_id)
                ->select(['id','name','short_description','is_free_course','image'])->get();

            if($courses->count() > 0)
            {
                return $this->apiResponse(200,'success message',null,$courses);
            }

            return $this->apiResponse(400,'Courses Not Found');

        }catch (\exception $e)
        {
            return $this->apiResponse(400,'some thing went wrong');
        }
    }


    public function my_courses()
    {
        try {
            $courses=Course::where('user_id',Auth::user()->id)
                ->select(['id','name','short_description','image'])->get();

            if($courses->count() > 0)
            {
                return $this->apiResponse(200,'success message',null,$courses);
            }

            return $this->apiResponse(400,'Courses Not Found');

        }catch (\exception $e)
        {
            return $this->apiResponse(400,'some thing went wrong');
        }
    }
}
