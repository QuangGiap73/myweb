<?php

namespace App\Http\Controllers;

use App\Models\Commentsss;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsssController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = Commentsss::create([
            'post_id' => $postId,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        // Load lại thông tin user để hiển thị
        $comment->load('user');

        return response()->json([
            'success' => true,
            'comment' => $comment
        ]);
    }

    public function destroy($id)
    {
        $comment = Commentsss::findOrFail($id);
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Bình luận đã bị xóa.'
        ]);
    }
}
