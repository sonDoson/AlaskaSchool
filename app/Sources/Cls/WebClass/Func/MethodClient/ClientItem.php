<?php
namespace App\Sources\Cls\WebClass\Func\MethodClient;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsPostsCategoryInfo;

class ClientGetItem{
    public static function getItem($table, $id_posts){ 
        //define table 
        $table_posts = $table . "_posts";
        $table_category = $table . "_category";
        $table_images = $table . "_images";
        $table_subtitle = $table . "_subtitle";
        //get data
        $data_posts = DB::table($table_posts)->where('id', $id_posts)->first();
        //get category
        $data_category = DB::table($table_category)->where('id', $data_posts->id_category)->first();
        //get image
        $image = array();
        $images = DB::table($table_images)->where('id_posts', $id_posts)->get();
        foreach($images as $key => $value){
            $image[] = $value->image_path;
        }
        //time
        $M = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Sept', 'Oct', 'Nov', 'Dec'];
        //
        $m_en = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Sept', 'Oct', 'Nov', 'Dec'];
        $m_vn = ['Th.1', 'Th.2', 'Th.3', 'Th.4', 'Th.5', 'Th.6', 'Th.7', 'Th.8', 'Th.9', 'Th.10', 'Th.11', 'Th.12', 'Th.13'];
        
        $date = explode(" ",$data_posts->created_at);
        $date = explode("-",$date[0]);
        $date_format['string'] = $date[2] . ' ' . $M[(int)$date[1] - 1] . ' ' . $date[0];
        $date_format['value_en'] = $date[2] . ' ' . $m_en[(int)$date[1] - 1] . ' ' . $date[0];
        $date_format['value_vn'] = $date[2] . ' ' . $m_vn[(int)$date[1] - 1] . ' ' . $date[0];
        $date_format[0] = $date[2];
        $date_format[1] = $M[(int)$date[1] - 1];
        $date_format[2] = $date[0];
        //subtitle
        $data_subtile = DB::table($table_subtitle)->where('id_posts', $id_posts)->first();
        //return
        $return = array();
        $return['id'] = $data_posts->id;
        $return['id_category'] = $data_category->id;
        $return['category_en'] = $data_category->name_en;
        $return['category_vn'] = $data_category->name_vn;
        $return['name_en'] = $data_posts->name_en;
        $return['name_vn'] = $data_posts->name_vn;
        $return['value_en'] = $data_posts->value_en;
        $return['value_vn'] = $data_posts->value_vn;
        $return['created_at'] = $date_format;
        $return['images'] = $image;
        if(!empty($data_subtile)){
            $return['subtitle_en'] = $data_subtile->value_en;
            $return['subtitle_vn'] = $data_subtile->value_vn;
        }   else    {
            $return['subtitle_en'] = null;
            $return['subtitle_vn'] = null;
        }
        return $return;
    }