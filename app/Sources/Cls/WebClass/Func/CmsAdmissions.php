<?php
namespace App\Sources\Cls\WebClass\Func;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsAdmisstionEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsAdmisstionGetPosts;
use App\Sources\Cls\WebClass\Func\Method\CmsAdmisstionAdd;

class CmsAdmissions{
    public static function admissionsList($id_category){
        return DB::table('registration_posts')->where('id_category', $id_category)->get();
    }
    public static function admisstionEdit($request){
        return CmsAdmisstionEdit::admisstionEdit($request);
    }
    public static function admisstionGetPosts($id){
        return CmsAdmisstionGetPosts::admisstionGetPosts($id);
    }
    public static function admisstionAdd($request){
        return CmsAdmisstionAdd::Request($request);
    }
}