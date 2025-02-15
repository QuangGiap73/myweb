<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentsss;

class AdminCommentsssController extends Controller
{
    public function index()
    {
        $comments = Commentsss::latest()->paginate(10);
        return view('backend.comments.index', compact('comments'));
    }

    public function destroy($id)
    {
        Commentsss::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Bình luận đã bị xóa.');
    }
}
