<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.login.admin_login');
    }
    public function loginAction(Request $request)
    {
       
        $check = User::where('username', $request->username)->first();
        if ($check) {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();
                
                return redirect()->route('admin.allpost');
              
            }
            
            return back()->withErrors([
                'password' => 'Sai mật khẩu!',
            ]);
        } else {
            
            return back()->withErrors([
                'username' => 'Tài khoản của bạn chưa được xác nhận!',
            ]);
        }
    }
}
