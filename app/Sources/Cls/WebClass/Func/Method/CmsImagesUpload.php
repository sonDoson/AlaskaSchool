<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsImagesUpload{
    
    public static function imagesUpload($request, $table, $id_posts, $good_files = 0){
        //validator
        
        //
        $table_posts = $table . "_posts";
        $table_images = $table . "_images";
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $key => $image){
                //name
                $name = $id_posts . '_' . $key . '.' . $image->getClientOriginalExtension();
                
                //path
                $path = '/uploads/images/' . $table_posts;
                $destinationPath = public_path($path);
                $image->move($destinationPath, $name);
                
                //Store database
                $image_path = $path . '/' . $name;
                DB::table($table_images)->insert(
                    ['id_posts' => $id_posts, 'image_name' => $name, 'image_path' => $image_path]
                );
            }
        }
    }
    public static function imagesUploadCategory($request, $table, $id_posts){
        //validator
        
        //
        $table_posts = $table;
        $table_images = $table . "_images";
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $key => $image){
                //name
                $name = $id_posts . '_' . $key . '.' . $image->getClientOriginalExtension();
                
                //path
                $path = '/uploads/images/' . $table_posts;
                $destinationPath = public_path($path);
                $image->move($destinationPath, $name);
                
                //Store database
                $image_path = $path . '/' . $name;
                DB::table($table_images)->insert(
                    ['id_posts' => $id_posts, 'image_name' => $name, 'image_path' => $image_path]
                );
            }
        }
    }
    public static function imagesUploadSingleTable($request, $table, $id_posts){
        $table_images = $table . "_images";
        //get last id_image
        $db = DB::table($table_images)->orderBy('id', 'desc')->first();
        $id = 0;
        if(isset($db->id)){
            $id = $db->id;
        }
        //upload with re_id
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $key => $image){
                //count id
                $count_id = $id + $key + 1;
                //name
                $name = $table . '_' . $count_id . '.' . $image->getClientOriginalExtension();
                //path
                $path = '/uploads/images/' . $table_images;
                $destinationPath = public_path($path);
                $image->move($destinationPath, $name);
                //Store database
                $image_path = $path . '/' . $name;
                DB::table($table_images)->insert(
                    ['id' => $count_id, 'image_name' => $name, 'image_path' => $image_path]
                );
            }
        }
    }
}