<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Commentsss;
use App\Models\Category;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        
        $posts = Post::with('category')->latest()->get(); // Lấy luôn thông tin danh mục
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
            'category_id' => 'required|exists:categories,id', // Kiểm tra danh mục hợp lệ
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
            if ($post->img) {
                Storage::disk('public')->delete($post->img);
            }
            $imgPath = $request->file('img')->store('posts', 'public');
            $post->img = $imgPath;
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
            Storage::disk('public')->delete($post->img);
        }

        // Xóa bình luận liên quan
        Commentsss::where('post_id', $post->id)->delete();

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Bài viết và bình luận đã bị xóa.');
    }
    public function postsByCategory($id)
    {
        $categories = Category::all(); // Lấy tất cả danh mục từ database
        $selectedCategory = Category::findOrFail($id); // Lấy danh mục đang chọn
        $posts = Post::where('category_id', $id)->get(); // Lấy bài viết thuộc danh mục
    
        return view('frontend.categorys_posts', compact('categories', 'selectedCategory', 'posts'));
    }
    

    

}
