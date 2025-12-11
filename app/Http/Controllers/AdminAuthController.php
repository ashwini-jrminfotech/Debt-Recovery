<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('pages.admin.login'); // adjust if your view path is different
    }

    // Handle login submit
    public function login(Request $request)
    {
        // validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // find admin by username
        $admin = DB::table('admins')->where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withInput($request->only('username'))->with('error', 'Invalid username or password');
        }

        // Save admin session (you can extend to store id/name)
        session([
            'admin_logged_in' => true,
            'admin_id' => $admin->id,
            'admin_username' => $admin->username,
        ]);

        return redirect()->route('admin.dashboard');
    }

    // Logout
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_id', 'admin_username']);
        return redirect()->route('admin.login');
    }
}
