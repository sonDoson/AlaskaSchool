<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\TotalPostsAdd;

class CmsUserDelete{
    public static function userDelete($id){
        //edit total
        TotalPostsAdd::totalPostsAdd('users', 1, -1);
        //delete information
        DB::table('users_infomation')->where('id_user', $id)->delete();
        //delete user
        DB::table('users')->where('id', $id)->delete();
    }
}