<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsPostsCategoryInfo{
    public static function postsListCategoryInfo($id_category){
        $db_category = DB::table('posts_category')
                       ->where('id', $id_category)
                       ->first();
        $return = array();
        $return[$db_category->id]['name_vn'] = $db_category->name_vn;
        $return[$db_category->id]['name_en'] = $db_category->name_en;
        return $return;
    }
    public static function getCategory($table_category){
        $db_category = DB::table($table_category)->get();
        $return = array();
        foreach($db_category as $key => $value){
            $return[$value->id]['name_vn'] = $value->name_vn;
            $return[$value->id]['name_en'] = $value->name_en;
        }
        Return $return;
    }
}