<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.layouts.index');
    }

    public function user_info(String $id)
    {
        $user = User::query()->where('id', $id)->first();

        return view('admin.user.profile', compact('user'));
    }
    public function user_edit(String $id)
    {

        $user = User::query()->where('id', $id)->firstOrFail();

        return view('admin.user.edit_profile', compact('user'));
    }

    public function user_update(Request $request, User $user)
    {
        try {
            $user->update($request->all());
            return back()->with('success', "Cập nhập thông tin thành công");
        } catch (\Exception $e) {
            // Xử lý ngoại lệ
            return back()->withErrors(['error' => 'Có lỗi xảy ra khi cập nhật thông tin người dùng.']);
        }
    }
}
