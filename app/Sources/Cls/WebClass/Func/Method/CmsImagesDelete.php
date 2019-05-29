<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsImagesDelete{
    
    public static function imagesDelete($table, $id_posts){
        $table_images = $table . "_images";
        //get images
        $db_images = DB::table($table_images)->where('id_posts', $id_posts)->get();
        foreach($db_images as $key => $value){
            unlink( public_path($value->image_path));
        }        
        DB::table($table_images)->where('id_posts', $id_posts)->delete();
    }
    
    public static function imagesDeleteSingleTable($request, $table){
        $table_images = $table . "_images";
        //explode image array
        $req_image = array();
        foreach($request->checkbox as $key => $value){
            $value_explode = explode("&",$value);
            $req_image[$key]['id'] = $value_explode[0];
            $req_image[$key]['path'] = $value_explode[1];
        }
        
        foreach($req_image as $key => $value){
            //unlink old image
            unlink(public_path($value['path']));
            //delete database
            DB::table($table_images)->where('id', $value['id'])->delete();
        }
    }
}