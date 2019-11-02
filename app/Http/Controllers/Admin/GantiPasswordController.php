<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class GantiPasswordController extends Controller
{
    public function index() {
        return view('admin.ganti-password');
    }

    public function update(Request $request) {
        $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);
        
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(url()->previous())->with('success', 'Password berhasil diupdate');
    }
}
