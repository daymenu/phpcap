<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Article;

class DetailController extends CommonController
{
    public function index(Request $request, $id)
    {
        $article = new Article();
        $view['article'] = $article =  $article->detail($id);
        if (!$article) {
            redirect('/404');
        }
        $view['categoryId']  = $article->category_id;
        return view('/home/detail', $view);
    }
}