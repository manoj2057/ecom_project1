<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function adminLogin(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // dd($data);
            if(Auth::guard('admin')->attempt(['email'=> $data['email'],'password'=>$data['password'], 'status' => 1])){
                return redirect('/admin/dashboard');
            }
            else{
                return redirect()->back();
            }
        }
        return view('admin.auth.login');
    }
    public function dashboard(){ 
        return view('admin.dashboard');
    }


    public function adminlogout(){
        Auth::guard('admin')->logout();
        return  redirect('/admin/login');
    }
    
    public function forgetPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $validateData = $request->validate([
               'email' => 'required'
            ]);
            $adminCount = Admin::where('email', $data['email'])->count();
            if($adminCount == 0){
                return redirect()->back()->with('error_message', 'User Doesnot Exist in Our Database');
            }
            // Get Admin Details
            $adminDetails = Admin::where('email', $data['email'])->first();
            // Generate Password
            $random_password = Str::random(10);
            // Encode Password
            $new_password = bcrypt($random_password);
            // Update Password
            Admin::where('email', $data['email'])->update(['password' => $new_password]);
            // Send Email
            $email = $data['email'];
            $name = $adminDetails->name;
            $messageData = ['email' => $data['email'], 'password' => $random_password, 'name' => $name];
            Mail::send('email.forgotpassword', $messageData, function($message) use ($email){
                $message->to($email)->subject('New Password - travel project');
            });

            return redirect()->back()->with('success_message', 'Please Check your email for updated password');

        }
        return view ('admin.auth.forgot');
    }

}
