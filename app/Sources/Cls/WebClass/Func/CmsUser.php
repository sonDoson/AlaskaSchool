<?php
namespace App\Sources\Cls\WebClass\Func;

use App\Sources\Cls\WebClass\Func\Method\CmsUserRoleAdd;
use App\Sources\Cls\WebClass\Func\Method\CmsUserRoleDelete;
use App\Sources\Cls\WebClass\Func\Method\CmsUserRoleCategory;
use App\Sources\Cls\WebClass\Func\Method\CmsUserList;
use App\Sources\Cls\WebClass\Func\Method\CmsUserAdd;
use App\Sources\Cls\WebClass\Func\Method\CmsUserRoleValidator;
use App\Sources\Cls\WebClass\Func\Method\CmsUserProfile;
use App\Sources\Cls\WebClass\Func\Method\CmsUserUpdate;
use App\Sources\Cls\WebClass\Func\Method\CmsUserDelete;

class CmsUser{
    public static function userAdd($request){
        return CmsUserAdd::userAdd($request);
    }
    public static function userRoleAdd($request){
        return CmsUserRoleAdd::userRoleAdd($request);
    }
    public static function userRoleDelete($id_role){
        return CmsUserRoleDelete::userRoleDelete($id_role);
    }
    public static function userRoleEdit($id_role){
        return userRoleEdit::userRoleEdit($id_role);
    }
    public static function roleCategory(){
        return CmsUserRoleCategory::roleCategory();
    }
    public static function userList(){
        return CmsUserList::userList();
    }
    public static function userRoleValidator($route, $action){
        return CmsUserRoleValidator::userRoleValidator($route, $action);
    }    
    public static function userRoleValidatorAll($route){
        return CmsUserRoleValidator::userRoleValidatorAll($route);
    }
    public static function userProfile($id){
        return CmsUserProfile::userProfile($id);
    }
    public static function userUpdate($request){
        return CmsUserUpdate::userUpdate($request);
    }
    public static function userDelete($id_user){
        return CmsUserDelete::userDelete($id_user);
    }
}