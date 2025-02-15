<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Commentsss;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.posts.index', compact('posts'));
    }

    // Hiển thị form thêm bài viết
    public function create()
    {
        return view('backend.posts.create');
    }

    // Xử lý lưu bài viết mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('posts', 'public');
        }

        Post::create([
            'name' => $request->name,
            'img' => $imgPath,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được thêm.');
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit(Post $post)
    {
        return view('backend.posts.edit', compact('post'));
    }

    // Xử lý cập nhật bài viết
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);

        // Nếu có ảnh mới được tải lên
        if ($request->hasFile('img')) {
            // Xóa ảnh cũ (nếu có)
            if ($post->img) {
                Storage::disk('public')->delete($post->img);
            }

            // Lưu ảnh mới
            $imgPath = $request->file('img')->store('posts', 'public');
            $post->img = $imgPath;
        }

        // Cập nhật dữ liệu bài viết
        $post->name = $request->name;
        $post->content = $request->content;
        $post->is_published = $request->has('is_published');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được cập nhật.');
    }

    // Xóa bài viết
    public function destroy(Post $post)
    {
        if ($post->img) {
            Storage::disk('public')->delete($post->img);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Bài viết đã bị xóa.');
    }
 

}
