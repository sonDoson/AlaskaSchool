<?php
namespace App\Sources\Cls\WebClass\Func\MethodClient;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsPostsCategoryInfo;

class ClientItemCategoryList{
    public static function getCategoryItemList($table, $index = 0){
        //define table
        $table_category = $table . "_category";
        //loadmore
        $items = 12;
        $skip = $items * $index;
        //get db
        $db_category = DB::table($table_category)
                       ->orderBy('updated_at', 'desc')->skip($skip)->take($items)->get();
        $item = array();
        foreach($db_category as $key => $value){
            //get image
            $image = array();
            $images = DB::table($table_category . '_images')->where('id_posts', $value->id)->get();
            foreach($images as $k => $v){
                $image[] = $v->image_path;
            }  
            //subtitle
            $data_subtile = DB::table($table_category . '_subtitle')
                            ->where('id_posts', $value->id)->first();
                            
            $item[$key]['id'] = $value->id;
            $item[$key]['name_en'] = $value->name_en;
            $item[$key]['name_vn'] = $value->name_vn;
            if(!empty($data_subtile)){
                $item[$key]['subtitle_en'] = $data_subtile->value_en;
                $item[$key]['subtitle_vn'] = $data_subtile->value_vn;
            }   else    {
                $item[$key]['subtitle_en'] = null;
                $item[$key]['subtitle_vn'] = null;
            }
            $item[$key]['images'] = $image;
        }
        return $item;
    }
}