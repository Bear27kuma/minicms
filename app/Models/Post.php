<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    // 公開のみ表示
    public function scopePublic(Builder $query)
    {
        return $query->where('is_public', true);
    }

    // 公開記事一覧取得
    public function scopePublicList(Builder $query)
    {
        return $query
            ->public()
            ->latest('published_at')
            ->paginate(10);
    }

    // 公開記事をIDで取得
    public function scopePublicFindById(Builder $query, int $id)
    {
        // find → 一致しない場合はnullを返す。 findOrFail → 一致しない場合はエラーを返す
        return $query->public()->findOrFail($id);
    }
}
