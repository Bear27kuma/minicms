<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;


    /**
     * 公開のみ表示
     * @param Builder $query
     * @return Builder
     */
    public function scopePublic(Builder $query)
    {
        return $query->where('is_public', true);
    }

    /**
     * 公開記事一覧取得
     * @param Builder $query
     * @return mixed
     */
    public function scopePublicList(Builder $query)
    {
        return $query
            ->public()
            ->latest('published_at')
            ->paginate(10);
    }

    /**
     * 公開記事をIDで取得
     * @param Builder $query
     * @param int $id
     * @return mixed
     */
    public function scopePublicFindById(Builder $query, int $id)
    {
        // find → 一致しない場合はnullを返す。 findOrFail → 一致しない場合はエラーを返す
        return $query->public()->findOrFail($id);
    }

    /**
     * 公開日を年月日で表示
     * @return string
     */
    public function getPublishedFormatAttribute()
    {
        return $this->published_at->format('Y年m月d日');
    }
}
