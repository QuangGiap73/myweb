<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Commentsss;
use App\Models\Category;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        $posts = Post::with('category')->latest()->get();
        return view('backend.posts.index', compact('posts'));
    }

    // Hiển thị form thêm bài viết
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create', compact('categories'));
    }

    // Xử lý lưu bài viết mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imgUrl = null;
        if ($request->hasFile('img')) {
            $uploadedFile = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
            $imgUrl = $uploadedFile;
        }

        Post::create([
            'name' => $request->name,
            'img' => $imgUrl,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được thêm.');
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('backend.posts.edit', compact('post', 'categories'));
    }

    // Xử lý cập nhật bài viết
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('img')) {
            // Xóa ảnh cũ trên Cloudinary (nếu có)
            if ($post->img) {
                Cloudinary::destroy($post->img);
            }

            // Upload ảnh mới
            $uploadedFile = Cloudinary::upload($request->file('img')->getRealPath())->getSecurePath();
            $post->img = $uploadedFile;
        }

        $post->update([
            'name' => $request->name,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được cập nhật.');
    }

    // Xóa bài viết + bình luận liên quan
    public function destroy(Post $post)
    {
        if ($post->img) {
            Cloudinary::destroy($post->img);
        }

        // Xóa bình luận liên quan
        Commentsss::where('post_id', $post->id)->delete();

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Bài viết và bình luận đã bị xóa.');
    }

    public function postsByCategory($id)
    {
        $categories = Category::all();
        $selectedCategory = Category::findOrFail($id);
        $posts = Post::where('category_id', $id)->get();

        return view('frontend.categorys_posts', compact('categories', 'selectedCategory', 'posts'));
    }
}
