<?php

namespace App\Http\Controllers\Web;

use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index(Request $request)
    {
        $news = new Article();
        $view['news'] = $news->news();
        return view('/home/index', $view);
    }
}