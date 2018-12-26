<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\ArticleContent;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Article $article)
    {
        $search = $request->input('search');
        if ($search) {
            $article = $article->where('name', 'like', '%' . $search . '%');
        }
        $list = $article->orderBy('id', 'desc')->paginate($request->input('limit'));

        return $this->apiSuccess($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Article $article)
    {
        $validated = $request->validated();
        $article->title = (string)$request->input('title');
        $article->keywords = (string)$request->input('keywords');
        $article->author = (string)$request->input('author');
        $article->category_id = (int)$request->input('category_id');
        $article->order_by = (int)$request->input('order_by');
        $article->is_top = (int)$request->input('is_top');
        $article->editor = (int)$request->input('editor');
        $article->publishd_time = (int)strtotime($request->input('publishd_time'));
        $article->status = (int)$request->input('status');
        $article->save();

        $articleContent = new ArticleContent();
        $articleContent->article_id = $article->id;
        $articleContent->content = (string)$request->input('content');
        $articleContent->save();
        return $this->apiSuccess($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Api  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Role $article)
    {
        return $this->apiSuccess($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api  $article
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Article $article)
    {
        $validated = $request->validated();
        $validated = $request->validated();
        $article->title = (string)$request->input('title');
        $article->keywords = (string)$request->input('keywords');
        $article->author = (string)$request->input('author');
        $article->category_id = (int)$request->input('category_id');
        $article->order_by = (int)$request->input('order_by');
        $article->is_top = (int)$request->input('is_top');
        $article->editor = $request->user()->id;
        $article->publishd_time = (int)strtotime($request->input('publishd_time'));
        $article->status = (int)$request->input('status');
        $article->save();

        $articleContent = new ArticleContent();
        $articleContent->article_id = $article->id;
        $articleContent->content = (string)$request->input('content');
        $articleContent->save();
        return $this->apiSuccess($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return $this->apiSuccess($article);
    }
}
