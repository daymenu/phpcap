<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $categorys = Category::get();
        $view['categorys'] = $categorys;
        return view('/home/index', $view);
    }
}