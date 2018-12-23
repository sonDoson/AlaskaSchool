<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsUserUpdate{
    public static function userUpdate($request){
        //role
        DB::table('users_infomation')->where('id_user', $request->id)->update(['id_user_role' => $request->role]);
        //username
        if($request->name !== null){
            DB::table('users')->where('id', $request->id)->update(['name' => $request->name]);
        }
        //phone
        if($request->phone !== null){
            DB::table('users_infomation')->where('id_user', $request->id)->update(['phone' => $request->phone]);
        }
        //email
        if($request->email !== null){
            DB::table('users')->where('id', $request->id)->update(['email' => $request->email]);
        }
    }
}