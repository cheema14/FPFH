<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiResponser;

class CategoryApiController extends Controller
{
    use ApiResponser;

    public function get_all_categories(){

        $categories = Category::all();

        return $this->success(
            [
                'categories' => $categories,
            ],
            'All Categories for watches'
        );
    }
}
