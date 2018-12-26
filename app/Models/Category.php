<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;
    
    public function kv($ids = [])
    {
        if ($ids) {
            $this->whereIn('id', $ids);
        }
        $data = $this->select('id', 'name')->get();
        $kv = [];
        if ($data) {
            foreach ($data as $item) {
                $kv[$item->id] = $item->name;
            }
        }
        return $kv;
    }
}
