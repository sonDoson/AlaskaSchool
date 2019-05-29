<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;

class ControllerSendMail extends Controller
{
    public function postSendMail(Request $request){
        $role = DB::table('user_role_name')->select('id')->where('email', 1)->get();
        $role_array = array();
        foreach($role as $value){
            $role_array[] = $value->id;
        }
        $users_info = DB::table('users_infomation')->select('id','id_user')
            ->whereIn('id_user_role', $role_array)->get();
        $users_info_array = array();
        foreach($users_info as $value){
            $users_info_array[] = $value->id;
        }
        $users = DB::table('users')->select('id','email')
            ->whereIn('id', $users_info_array)->get();
        $users_email = array();
        foreach($users as $value){
            $users_email[]['email'] = $value->email;
        }
        
        $data['email'] = $request->email; 
        $data['name'] = $request->name; 
        $data['number'] = $request->number; 
        $data['content'] = $request->content; 
        Mail::send('client.content.mail_layout', $data, function($msg) use ($users_email){
            $msg->from('info@alaskaschool.edu.vn', 'Hệ Thống Email Alaska School');
            foreach($users_email as $value){
                $msg->to($value['email'] , $value['email'])->subject('Khách hàng gửi email từ website.');
            }
        });
        return redirect('/thank-you');
    }
}
