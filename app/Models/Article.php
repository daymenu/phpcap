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
        if (isset($data['categoryId'])) {
            $this->where('category_id', $data['categoryId']);
        }
        $list = $this->where('status', 2)->paginate($pageSize);
        return $list;
    }

    public function detail($id)
    {
        $article = $this->where('publishd_time', '<', time())->find($id);
        $articleContent = ArticleContent::find($id);
        $article->content = $articleContent->content;
        return $article;
    }
}
