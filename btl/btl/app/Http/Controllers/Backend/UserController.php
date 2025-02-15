<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Hiển thị danh sách thành viên
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }
    

    // Hiển thị form thêm thành viên
    public function create()
    {
        return view('backend.users.create');
    }

    // Xử lý thêm thành viên
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Thêm thành viên thành công!');
    }

    // Hiển thị form chỉnh sửa thành viên
    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    // Xử lý cập nhật thông tin thành viên
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Cập nhật thành viên thành công!');
    }

    // Xóa thành viên
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Xóa thành viên thành công!');
    }
}
