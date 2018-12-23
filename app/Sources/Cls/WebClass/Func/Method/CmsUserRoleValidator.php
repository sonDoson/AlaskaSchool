<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CmsUserRoleValidator{
    public static function userRoleValidator($route, $action){
        //get id_role user
        $id = Auth::id();
        $id_user_role = DB::table('users_infomation')->select('id_user_role')->where('id_user', $id)->first();
        //select value id_role which role
        $return = DB::table('user_role')->select($action)->where('id_role', $id_user_role->id_user_role)->where('id_menu', $route)->first();
        return $return->$action;
    }
    public static function userRoleValidatorAll($route){
        //get id_role user
        $id = Auth::id();
        $id_user_role = DB::table('users_infomation')->select('id_user_role')->where('id_user', $id)->first();
        //select value id_role which role
        $db_role = DB::table('user_role')->where('id_role', $id_user_role->id_user_role)->where('id_menu', $route)->first();
        return $db_role;
    }
}