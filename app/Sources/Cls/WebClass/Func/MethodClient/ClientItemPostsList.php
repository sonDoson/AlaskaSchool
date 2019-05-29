<?php
namespace App\Sources\Cls\WebClass\Func\MethodClient;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsPostsCategoryInfo;

class ClientItemPostsList{
    public static function getPostsItemList($table, $id, $index = 0){
        //define table
        $table_category = $table . "_category";
        $table_posts = $table . "_posts";
        $table_images = $table . "_images";
        $table_subtitle = $table . "_subtitle";
        //loadmore
        $items = 12;
        $skip = $items * $index;
        //get db
        $db_category = DB::table($table_category)->where('id', $id)->first();
                      // ->orderBy('created_at', 'desc')->skip($skip)->take($items)->get();
        $db_posts = DB::table($table_posts)->where('id_category', $id)
                    ->orderBy('updated_at', 'desc')->skip($skip)->take($items)->get();
        $item = array();
        foreach($db_posts as $key => $value){
            //get image
            $image = array();
            $images = DB::table($table_images)->where('id_posts', $value->id)->get();
            foreach($images as $k => $v){
                $image[] = $v->image_path;
            }  
            //subtitle
            $data_subtile = DB::table($table_subtitle)
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