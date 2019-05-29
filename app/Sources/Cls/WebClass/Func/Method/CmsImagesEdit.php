<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesUpload;

class CmsImagesEdit{
    
    public static function imagesEdit($request, $table, $id_posts){//table root ~ posts|posts_static
        $table_posts = $table . "_posts";
        $table_images = $table . "_images";
        if($request->hasFile('images')){
            //delete old image
            $db_old_images = DB::table($table_images)->where('id_posts', $request->id_posts)->get();
            $paths = array();
            foreach($db_old_images as $key => $value){
                unlink( asset('public/uploads/images/' ,$value->image_path));
            }
            DB::table($table_images)->where('id_posts', $request->id_posts)->delete();
        }
        //add new image
        CmsImagesUpload::imagesUpload($request, $table, $request->id_posts);
    }
    public static function imagesEditCategory($request, $table){
        //
        $table_posts = $table;
        $table_images = $table . "_images";
        if($request->hasFile('images')){
            //delete old image
            $db_old_images = DB::table($table_images)->where('id_posts', $request->id_posts)->get();
            $paths = array();
            foreach($db_old_images as $key => $value){
                unlink( public_path($value->image_path));
            }
            DB::table($table_images)->where('id_posts', $request->id_posts)->delete();
        }
        //add new image
        CmsImagesUpload::imagesUploadCategory($request, $table, $request->id_posts);
    }
}