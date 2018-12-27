<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ListController extends Controller
{
    public function index(Request $request, $cateId)
    {
        $article = new Article();
        
        $where['pageSize'] = 10;
        $where['category_id'] = $cateId;

        $articleList = $article->publishList($where);
        $view['articles'] = $articleList;
        return view('/home/list', $view);
    }
}