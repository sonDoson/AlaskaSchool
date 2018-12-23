<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsPostsDelete{
    public static function postsDelete($id_posts){
        $table_posts = "posts_posts";
        $table_subtitle = "posts_subtitle";
        $table_stress = "posts_posts_stress";
        //list images
        $item_images = DB::table($table_posts . '_images')->where('id_posts', $id_posts)->get();
        //delete image
        //unlink images
        foreach($item_images as $key => $value){
            unlink( public_path($value->image_path));
        }
        //del image
        DB::table($table_posts . '_images')->where('id_posts', $id_posts)->delete();
        //delete stress
        $db_stress = DB::table($table_stress)->where('id_posts', $id_posts)->first();
        if($db_stress !== null){
            DB::table($table_stress)->where('id_posts', $id_posts)->delete();
        }
        //delete subtitle
        $db_subtitle = DB::table($table_subtitle)->where("id_posts", $id_posts)->first();
        if($db_subtitle !== null){
            DB::table($table_subtitle)->where("id_posts", $id_posts)->delete();
        }
        
        //edit total posts
        $id_category = DB::table($table_posts)->where('id', $id_posts)->first();
        $id_category = $id_category->id_category;
        CmsTotalPostEdit::postsTotalEdit("posts_category", $id_category, -1);
        //delete item
        Db::table($table_posts)->where('id', $id_posts)->delete();
        return 'yes';
    }
}