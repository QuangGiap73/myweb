<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Commentsss;

class PostController extends Controller
{
    public function show($slug)
    {
        // Lấy bài viết theo slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Trả dữ liệu về view
        return view('blog-detail-01', compact('post'));
    }
    
}

