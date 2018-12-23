<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Sources\Cls\WebClass\Func\Method\TotalPostsAdd;

class CmsUserAdd{
    public static function userAdd($request){
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users'
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Người dùng đã tồn tại',
            'email.required' => 'Vui lòng nhập tên',
            'email.unique' => 'Email đã tồn tại'
        ]);
        if($validator->fails()) {
            return [$validator->errors(), $request->all()];
        }   else    {
            //total_posts
            TotalPostsAdd::totalPostsAdd('users', 1);
            //
            $id_user = DB::table('users')->insertGetId([
                'name' => $request->name,
                //'id_user_role' => $request->role,
                'email' => $request->email,
                //'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
            DB::table('users_infomation')->insertGetId([
                'id_user' => $id_user,
                'id_user_role' => $request->role,
                'phone' => $request->phone,
            ]);
            return 0;
        }
    }
}