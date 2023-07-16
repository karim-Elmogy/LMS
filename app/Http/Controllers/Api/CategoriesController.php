<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use ApiResponseTrait;
    public function categories()
    {
        try {

            $categories=Category::select(['id','name','desc','slug','image'])->get();

            if($categories->count() > 0)
            {
                return $this->apiResponse(200,'success message',null,$categories);
            }

            return $this->apiResponse(400,'Categories Not Found');


        }catch (\exception $e)
        {
            return $this->apiResponse(400,'some thing went wrong');
        }
    }


    public function sub_category(Request $request)
    {
        try {

            $sub_category=Sub_Category::where('category_id',$request->category_id)
                ->select(['id','name','desc','slug','image'])->get();

            if($sub_category->count() > 0)
            {
                return $this->apiResponse(200,'success message',null,$sub_category);
            }

            return $this->apiResponse(400,'Sub Categories Not Found');

        }catch (\exception $e)
        {
            return $this->apiResponse(400,'some thing went wrong');
        }
    }




}
