<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Mail;

class ControllerUserRePasswd extends Controller
{
    public function getRePasswd(){
        return view('user.content.re_passwd');
    }
    public function postRePasswd(Request $request){
        $db = DB::table('users')->where('email', $request->email)->first();
        if(!empty($db)){
            $id = Auth::id();
            $email = DB::table('users')->where('id', $id)->first();
            $email = $email->email;
        
            //new passthru
            function randomPassword() {
                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 8; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                return implode($pass); //turn the array into a string
            }
            $pass = randomPassword();
            $bcrypt_pass =  bcrypt($pass);
            DB::table('users')->where('id', $id) ->update(['password' => $bcrypt_pass]);
            $user_name = DB::table('users')->where('id', $id)->value('name');
        
            $data['content'] = $pass; 
            $data['name'] = $user_name; 
            Mail::send('user.content.email_repass', $data, function($msg)use($email){
                $msg->from('xulazy@gmail.com', 'Hệ Thống Email Alaska School');
                $msg->to($email ,'someone')->subject('Đổi mật khẩu.');
            });
            return redirect()->route('login');
        }   else    {
            return redirect()->route('postPostsPosts')->withErrors("email không khớp bất kỳ tài khoản nào!");
        }
    }
}
