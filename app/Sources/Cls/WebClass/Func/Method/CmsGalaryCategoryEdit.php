<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesEdit;

class CmsGalaryCategoryEdit{
    
    public static function galaryCategoryEdit($request, $table){
        //define table
        $table_posts = $table;
        $table_images = $table . "_images";
        $table_subtitle = $table . "_subtitle";
        $table_images = $table . "_images";
        //edit value
        if($request->category !== null){
            DB::table($table_posts)->where('id', $request->id_posts)
            ->update(['id_category' => $request->category]);
        }
        if($request->name['en'] !== null){
            DB::table($table_posts)->where('id', $request->id_posts)
            ->update(['name_en' => $request->name['en']]);
        }
        if($request->name['vn'] !== null){
            DB::table($table_posts)->where('id', $request->id_posts)
            ->update(['name_vn' => $request->name['vn']]);
        }
        //edit subtitle
        DB::table($table_subtitle)->where('id_posts', $request->id_posts)
        ->update(['value_en' => $request->sub['en'], 'value_vn' => $request->sub['vn']]);
        //edit images
        CmsImagesEdit::imagesEditCategory($request, $table);
        return 0;
    }
}