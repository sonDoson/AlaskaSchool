<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsUserRoleDelete{
    public static function userRoleDelete($id){
        //check user if had return fail
        $db_users_role = DB::table('users_infomation')->where('id_user_role', $id)->first();
        if($db_users_role !== null){
            return "fail";
        }
        //do delete
        DB::table('user_role')->where('id_role', $id)->delete();
        //delete role name;
        DB::table('user_role_name')->where('id', $id)->delete();
        return 0;
    }
}