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
                var_dump($image);die();
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
    public static function imagesAppend($request, $table, $id_posts){
        $table_images = $table . "_images";
        //get last id_image
        $db = DB::table($table_images)->where('id_posts', $id_posts)
            ->orderBy('id', 'desc')->first();
        if($db == null){
            DB::table($table_images)->where('id_posts', $request->id_posts)->delete();
            $images = $request->file('images');
            foreach($images as $key => $image){
                //name
                $name = $request->id_posts . '_' . $key . '.' . $image->getClientOriginalExtension();
                //path
                $path = '/uploads/images/posts_posts';
                $destinationPath = public_path($path);
                $image->move($destinationPath, $name);
                //Store database
                $table_images = 'posts_posts_images';
                $image_path = $path . '/' . $name;
                DB::table($table_images)->insert(
                    ['id_posts' => $request->id_posts, 'image_name' => $name, 'image_path' => $image_path]
                );
            }
            return 0;
        }
        //
        $sub_image_name = explode("_", $db->image_name);
        //upload with re_id
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $key => $image){
                //count id
                $count_id = $sub_image_name[1] + $key + 1;
                //name
                $name = $sub_image_name[0] . '_' . $count_id . '.' . $image->getClientOriginalExtension();
                //path
                $path = '/uploads/images/' . $table;
                $destinationPath = public_path($path);
                $image->move($destinationPath, $name);
                //Store database
                $image_path = $path . '/' . $name;
                DB::table($table_images)->insert(
                    ['id_posts' => $sub_image_name[0], 'image_name' => $name, 'image_path' => $image_path]
                );
            }
        }
    }
    public static function imagesAppendItem($request, $table, $id_posts){
        $table_images = $table . "_images";
        $folder = $table . "_posts";
        //get last id_image
        $db = DB::table($table_images)->where('id_posts', $id_posts)
            ->orderBy('id', 'desc')->first();
        if($db == null){
            DB::table($table_images)->where('id_posts', $request->id_posts)->delete();
            $images = $request->file('images');
            foreach($images as $key => $image){
                //name
                $name = $request->id_posts . '_' . $key . '.' . $image->getClientOriginalExtension();
                //path
                $path = '/uploads/images/' . $folder;
                $destinationPath = public_path($path);
                $image->move($destinationPath, $name);
                //Store database
                //$table_images = 'posts_posts_images';
                $image_path = $path . '/' . $name;
                DB::table($table_images)->insert(
                    ['id_posts' => $request->id_posts, 'image_name' => $name, 'image_path' => $image_path]
                );
            }
            return 0;
        }
        //
        $sub_image_name = explode("_", $db->image_name);
        //upload with re_id
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $key => $image){
                //count id
                $count_id = $sub_image_name[1] + $key + 1;
                //name
                $name = $sub_image_name[0] . '_' . $count_id . '.' . $image->getClientOriginalExtension();
                //path
                $path = '/uploads/images/' . $table;
                $destinationPath = public_path($path);
                $image->move($destinationPath, $name);
                //Store database
                $image_path = $path . '/' . $name;
                DB::table($table_images)->insert(
                    ['id_posts' => $sub_image_name[0], 'image_name' => $name, 'image_path' => $image_path]
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
    public static function imagesUploadSingleTable($request, $table){
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