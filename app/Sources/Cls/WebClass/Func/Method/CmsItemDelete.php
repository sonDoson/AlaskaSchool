<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesDelete;
use App\Sources\Cls\WebClass\Func\Method\CmsTotalPostEdit;

class CmsItemDelete{
    public static function itemDelete($table, $id){
        //define
        $table_posts = $table . "_posts";
        $table_category = $table . "_category";
        $table_subtitle = $table . "_subtitle";
        $table_total = $table . "_total";
        //delete images
        CmsImagesDelete::imagesDelete($table, $id);
        //delete subtitle
        $db_subtitle = DB::table($table_subtitle)->where("id_posts", $id)->first();
        if($db_subtitle !== null){
            DB::table($table_subtitle)->where("id_posts", $id)->delete();
        }
        //edit total posts
        $id_category = DB::table($table_posts)->where('id', $id)->first();
        $id_category = $id_category->id_category;
        CmsTotalPostEdit::totalEdit($table_total, $id_category, -1);
        //delete item
        Db::table($table_posts)->where('id', $id)->delete();
        return 0;
    }
}