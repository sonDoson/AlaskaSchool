<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsPostsCategoryInfo;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesDelete;
use App\Sources\Cls\WebClass\Func\Method\CmsItemDelete;

class CmsCategoryDelete{
    public static function categoryDelete($table, $id){
        //define
        $table_posts = $table . "_posts";
        $table_category = $table . "_category";
        $table_subtitle = $table . "_category_subtitle";
        $table_images = $table . "_category_images";
        //delete items
        $db_items = DB::table($table_posts)->select('id')->where('id_category', $id)->get();
        foreach($db_items as $key => $value){
            CmsItemDelete::itemDelete($table, $value->id);
        }
        //delete subtitle
        $db_subtitle = DB::table($table_subtitle)->where("id_posts", $id)->first();
        if($db_subtitle !== null){
            DB::table($table_subtitle)->where("id_posts", $id)->delete();
        }
        //delete images
        CmsImagesDelete::imagesDelete($table_category, $id);
        //delete category
        DB::table($table_category)->where('id', $id)->delete();
        return 0;
    }
}