<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsGalaryCategoryGet{
    
    public static function categoryGet($id){
        //get category
        $db_category = DB::table('galary_category')->where('id', $id)->first();
        //get subtitle
        $db_subtitle = DB::table('galary_category_subtitle')->where('id_posts', $id)->first();
        //mixing data
        $return = array();
        $return['id'] = $db_category->id;
        $return['name_en'] = $db_category->name_en;
        $return['name_vn'] = $db_category->name_vn;
        $return['subtitle_en'] = $db_subtitle->value_en;
        $return['subtitle_vn'] = $db_subtitle->value_vn;
        //return data
        return $return;
    }
}