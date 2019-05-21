<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    public function publishList(array $data = [])
    {

        $pageSize = max(1, $data['pageSize']);
        $article = $this;
        if (isset($data['categoryId'])) {
           $article = $this->where('category_id', $data['categoryId']);
        }
        if (isset($data['title'])) {
           $article = $this->where('title','like', "%{$data['title']}%");
        }
        $list = $article->where('status', 2)->paginate(1);
        return $list;
    }

    public function detail($id)
    {
        $article = $this->where('publishd_time', '<', time())->find($id);
        $articleContent = ArticleContent::find($id);
        $article->content = $articleContent->content;
        return $article;
    }

    public function news()
    {
        $articles = $this->where('publishd_time', '<', time())
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();
        foreach ($articles as $k => $v) {
            $articleContent = ArticleContent::find($v->id);
            $articles[$k]->content = $articleContent->content;
        }
        return $articles;
    }
}
