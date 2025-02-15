<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        // Lấy danh sách bài viết đã được đăng
        $posts = Post::where('is_published', 1)->latest()->get();

        return view('news.index', compact('posts'));
    }

    public function show($id)
    {
        // Hiển thị chi tiết bài viết
        $post = Post::where('is_published', 1)->findOrFail($id);
        return view('news.show', compact('post'));
    }
}

