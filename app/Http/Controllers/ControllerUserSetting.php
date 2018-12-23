<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Web\WebDataUserWelcome;
use DB;
use Hash;
use Auth;
use App\Sources\Cls\WebClass\Func\Cms;

class ControllerUserSetting extends Controller
{
    public function getUserSetting(){
        //
        $menu = Cms::menu();
        //$menu = Cms::exportMenu();
        $data = new WebDataUserWelcome;
        $name_class = $data->class_name;
        $data_nav = $data->navData();
        $user = Auth::user();
        //
        $layout = "WebUserPost.css";
        $data = new WebDataUserWelcome;
        $name_class = $data->class_name;
        $data_nav = $data->navData();
        //db user
        $id = Auth::id();
        $db_user = DB::table('users')->where('id', $id)->first();
        $db_user_info = DB::table('users_infomation')->where('id_user', $id)->first();
        return view('user.content.setting', compact('db_user_info', 'db_user', 'menu', 'name_class', 'layout', 'name_class', 'data_nav'));
    }
    public function postUserSetting(Request $request){
        $id = Auth::id();
        $flag = 0;
        if($request->name !== null){
            DB::table('users')->where('id', $id)->update(['name' => $request->name]);
        }
        if($request->email !== null){
            DB::table('users')->where('id', $id)->update(['email' => $request->email]);
        }
        if($request->phone !== null){
            DB::table('users_infomation')->where('id_user', $id)->update(['phone' => $request->phone]);
        }
        
        $pass = DB::table('users')->where('id', $id)->first();
        $pass = $pass->password;
        if(Hash::check($request->pw_old,$pass)) {
            if($request->pw_new[0] === $request->pw_new[1]){
                $new_pass = bcrypt($request->pw_new[1]);
                DB::table('users')->where('id', $id)->update(['password' => $new_pass ]);
            }   else    {
                $flag = 1;
            }
        }
        
        if($flag == 0){
            return redirect()->route('getUserSetting')->withErrors('Cập nhật thành công!');
        }   else    {
            return redirect()->route('getUserSetting')->withErrors('Không thành công! vui lòng thử lại');
        }
    }
}
