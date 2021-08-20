<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * 一覧画面
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // 公開・新しい順に表示
        $posts = Post::where('is_public', true)
                        ->orderBy('published_at', 'DESC')
                        ->paginate(10);

        return view('front.posts.index', compact('posts'));
    }

    /**
     * 詳細画面
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        // find → 一致しない場合はnullを返す。 findOrFail → 一致しない場合はエラーを返す
        $post = Post::where('is_public', true)->findOrFail($id);

        return view('front.posts.index', compact('post'));
    }
}
