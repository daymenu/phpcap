<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ListController extends CommonController
{
    public function index(Request $request, $cateId)
    {
        $article = new Article();
        $where['pageSize'] = 10;
        $view['categoryId'] = $where['categoryId'] = $cateId;
        $cate = Category::select('name')->find($cateId);
        $view['categoryName'] = isset($cate->name) ? $cate->name: '';
        $articleList = $article->publishList($where);
        $articleList->appends($request->input());
        $view['articles'] = $articleList;
        return view('/home/list', $view);
    }

    public function search(Request $request)
    {
        $article = new Article();
        $kw = $request->input('kw');
        $where['pageSize'] = 10;
        $where['title'] = $kw;

        $articleList = $article->publishList($where);
        $articleList->appends($request->input());
        $view['articles'] = $articleList;
        return view('/home/search', $view);
    }
}