<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ArticleContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
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
            $article = $article->where('title', 'like', '%' . $search . '%');
        }
        $list = $article->orderBy('id', 'desc')->paginate($request->input('limit'))->toArray();
        if ($list['data']) {
            $kv = (new Category())->kv();
            foreach ($list['data'] as $k => $item) {
                $list['data'][$k]['categoryName'] = isset($kv[$item['category_id']]) ? $kv[$item['category_id']] : '';
                $list['data'][$k]['publishd_time'] = $item['publishd_time'] ? date('Y-m-d H:i:s', $item['publishd_time']) : '';
            }
        }
        return $this->apiSuccess($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, Article $article)
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
    public function show(Article $article)
    {
        $articleContentModel = new ArticleContent();
        $articleContent = $articleContentModel->find($article->id);
        $article->content = $articleContent->content;
        $article->publishd_time = $article->publishd_time ? date('Y-m-d H:i:s', $article->publishd_time) : '';
        return $this->apiSuccess($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Api  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
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

        $articleContent = ArticleContent::find($article->id);
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
