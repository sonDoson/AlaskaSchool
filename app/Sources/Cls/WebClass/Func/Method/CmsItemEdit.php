<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesUpload;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesDelete;

class CmsItemEdit{
    
    public static function itemEdit($table, $request){
        //define table
        $table_posts = $table . "_posts";
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
        if($request->date !== null){
            $db_posts = DB::table($table_posts)->where('id', $request->id_posts)->first();
            $db_date = $db_posts->created_at;
            $db_date_sub = explode(" ", $db_date);
            $db_date_new = $request->date . " " . $db_date_sub[1];
            DB::table($table_posts)->where('id', $request->id_posts)
                ->update(['created_at' => $db_date_new]);
        }
        DB::table($table_posts)->where('id', $request->id_posts)
        ->update(['value_en' => $request->value['en'], 'value_vn' => $request->value['vn']]);
        //edit subtitle
        DB::table($table_subtitle)->where('id_posts', $request->id_posts)
        ->update(['value_en' => $request->sub['en'], 'value_vn' => $request->sub['vn']]);
        //edit images
        //CmsImagesEdit::imagesEdit($request, $table, $request->id_posts);
        if($request->checkbox !== null){
            CmsImagesDelete::imagesDeleteSingleTable($request, $table);
        }
        if($request->hasFile('images')){
            CmsImagesUpload::imagesAppendItem($request, $table, $request->id_posts);
        }

        return 0;
    }
}