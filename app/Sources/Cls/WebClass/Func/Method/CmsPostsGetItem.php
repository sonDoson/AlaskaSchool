<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsPostsGetItem{
    public static function postsGetSingleItem($id_posts){ 
        //get data
        $data_posts = DB::table('posts_posts')->where('id', $id_posts)->first();
        //get category
        $data_category = DB::table('posts_category')->where('id', $data_posts->id_category)->first();
        //get image
        $image = array();
        $images = DB::table('posts_posts_images')->where('id_posts', $id_posts)->get();
        foreach($images as $key => $value){
            $image[] = $value->image_path;
        }
        //subtitle
        $data_subtitle = DB::table('posts_subtitle')->where('id_posts', $id_posts)->first();
        $sub['vn'] = "";
        $sub['en'] = "";
        if($data_subtitle !== null){
            $sub['vn'] = $data_subtitle->value_vn;
            $sub['en'] = $data_subtitle->value_en;
        }
        //check stress
        $stress = DB::table('posts_posts_stress')->where('id_posts', $id_posts)->first();
        if(!empty($stress->id_posts)){
            $stress = true;
        }   else    {
            $stress = false;
        }
        //time
        $M = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Sept', 'Oct', 'Nov', 'Dec'];
        $date = explode(" ",$data_posts->created_at);
        $date = explode("-",$date[0]);
        $date_format['string'] = $date[2] . ' ' . $M[(int)$date[1] - 1] . ' ' . $date[0];
        $date_format[0] = $date[2];
        $date_format[1] = $M[(int)$date[1] - 1];
        $date_format[2] = $date[0];
        
        //return
        $return = array();
        $return['id'] = $data_posts->id;
        $return['id_category'] = $data_category->id;
        $return['category_en'] = $data_category->name_en;
        $return['category_vn'] = $data_category->name_vn;
        $return['name_en'] = $data_posts->name_en;
        $return['name_vn'] = $data_posts->name_vn;
        $return['subtitle_vn'] = $sub['vn'];
        $return['subtitle_en'] = $sub['en'];
        $return['value_en'] = $data_posts->value_en;
        $return['value_vn'] = $data_posts->value_vn;
        $return['created_at'] = $date_format;
        $return['images'] = $image;
        $return['stress'] = $stress;
        return $return;
    }
}