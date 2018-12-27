<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $article = new Article();
        $view['article'] = $article->detail($id);
        return view('/home/detail', $view);
    }
}