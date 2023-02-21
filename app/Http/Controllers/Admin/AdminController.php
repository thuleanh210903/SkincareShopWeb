<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class AdminController extends Controller{
    
    public function index(){
        return view('admin.admin_login');
    }
    public function show_dashboard(){
       
        return view('admin.index');
    }
    public function xu_ly_login(Request $request){
        
        $admin_name = $request->admin_name;
        $admin_password = $request->admin_password;
        $result = DB::table('admin')->where('admin_name',$admin_name)->where('admin_password',$admin_password)->first();
        
        if($result){
            session()->put('admin_id', $result->admin_id);
            session()->put('admin_name', $result->admin_name);
            return view('admin.index');
        }
       
    }
    public function logout(){
        session()->put('admin_name',null);
        session()->put('admin_id',null);
        return redirect()->route('login'); 
    }
}