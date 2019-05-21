<?php

namespace App\Http\Controllers\Web;

use Illuminate\Routing\Controller;

use App\Models\Category;

class CommonController extends Controller
{
    public function __construct()
    {
        $categorys = Category::get();
        view()->share('categorys', $categorys);
        view()->share('categoryId', 0);
    }
}
