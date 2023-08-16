<?php

namespace App\Http\Controllers;

use App\Mail\NewPassword;
use App\Mail\OtpMail;
use App\Models\order_detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\orders;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('user.register', $data);
    }

    public function register_action(Request $request)
    {
        $check = User::where('username', $request->username)->first();
        if ($check) {
            $mailData = $request->username;
            return view('email.otp', compact('mailData'));
        } else {

            
            $request->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                'password_confirm' => 'required|same:password',
            ]);
            $otp = (int)round(time() / rand(100000, 999999) * 100);
            $user = new User([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'address' =>null,
                'numberphone' => null,
                'otp' => $otp,
                'status'=>0
            ]);
            $mailData = $request->username;
            $user->save();
            Mail::to($mailData)->send(new OtpMail($otp));
            return view('email.otp', compact('mailData'));

        }
    }
    // otp
    public function otp(Request $request)
    {
        if ($request->otp) {
            $check = User::where('username', $request->username)->first();
            if (($check['username'] == $request->username) && ($request->otp == $check['otp'])) {
                $user = User::where('username', $request->username)->update([
                    'status' => 1,
                ]);

                return redirect()->route('login')->with('success', 'Xác nhận thành công!');
            }
            else {
                echo "<script>";
                echo "alert('Mã otp không chính xác!');";
                echo "history.back();";
                echo "</script>";
                
            }
        }
    }
    // resend otp
    public function otp_resend(Request $request)
    {
        if ($request->username) {
            $check = User::where('username', $request->username)->first();
            if (($check['username'] == $request->username)) {
                $otp = (int)round(time() / rand(100000, 999999) * 100);
                $user = User::where('username', $request->username)->update([
                    'otp' => $otp,
                ]);
                $mailData = $request->username;
                Mail::to($mailData)->send(new OtpMail($otp));
                echo "<script>";
                echo "history.back();";
                echo "confirm('Mã xác nhận mới đã được gửi tới mail của bạn')";
                echo "</script>";
            }
        }
    }
    // forgot pass
    public function forgotPassword()
    {
        return view('user.forgotPassword');
    }
    public function forgotPassword_action(Request $request)
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $size = strlen($chars);
        $newPassword ="";
        for ($i = 0; $i < 9; $i++) {
            $newPassword.= $chars[rand(0, $size - 1)];
        }
        $user = User::where('username',$request->email)->first();
        if ($user){
            $mailData = $request->email;
            Mail::to($mailData)->send(new NewPassword($newPassword));
            $user->password = Hash::make($newPassword);
            $user->save();
            return redirect()->route('login')->with('success', 'Kiểm tra email của bạn để sử dụng mật khẩu mới!');
        }
        else {
            return back()->with('success', 'Email của bạn không tồn tại!');
        }
       
    }



    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request)
    {
        $check = User::where('username', $request->username)->first();
        if ($check['status'] == 1) {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();
                 
                    return redirect()->intended('/');
              
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

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }



    public function user()
    {
        return view('user.user_profile');
    }
    public function save_profile(Request $request)
    {
        $user_id = Auth::user()->user_id;
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->numberphone = $request->numberphone;
        $user->username = $request->username;
        $user->save();
        return view('user.user_profile');
    }

    public function view_order_history()
    {
        $order_by_user = orders::where('user_id', Auth::user()->user_id)->orderby('id_order', 'DESC')->get();
        
        // dd($order_by_user);
        return view('user.order-history', compact('order_by_user'));
    }

    public function view_order_detail($id_order)
    {
        $order_detail = order_detail::where('id_order', $id_order)->get();
        return view('user.order-detail-history', compact('order_detail'));
    }
    //

}