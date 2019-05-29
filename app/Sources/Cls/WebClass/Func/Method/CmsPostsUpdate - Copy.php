<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Sources\Cls\WebClass\Func\Method\CmsTotalPostEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsSubtitle;
use App\Sources\Cls\WebClass\Func\Method\PostsAddStress;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesUpload;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesDelete;
use App\Sources\Cls\WebClass\Func\Tool\Resize;

class CmsPostsUpdate{
    public static function postsEdit($request){
        
        //database posts
        $db_posts = DB::table('posts_posts')->where('id', $request->id_posts)->first();
        //edit value
        if($request->category !== null){
            DB::table('posts_posts')->where('id', $request->id_posts)->update(['id_category' => $request->category]);
        }
        if($request->name['en'] !== null){
            DB::table('posts_posts')->where('id', $request->id_posts)->update(['name_en' => $request->name['en']]);
        }
        if($request->name['vn'] !== null){
            DB::table('posts_posts')->where('id', $request->id_posts)->update(['name_vn' => $request->name['vn']]);
        }
        DB::table('posts_posts')->where('id', $request->id_posts)->update(['value_en' => $request->value['en'], 'value_vn' => $request->value['vn']]);
        //edit subtitle
        DB::table('posts_subtitle')->where('id_posts', $request->id_posts)->update(['value_en' => $request->sub['en'], 'value_vn' => $request->sub['vn']]);
        //edit image
        if($request->hasFile('images')){
            //delete old image
            $db_old_images = DB::table('posts_posts_images')->where('id_posts', $request->id_posts)->get();
            $paths = array();
            foreach($db_old_images as $key => $value){
                unlink( public_path($value->image_path));
            }
            DB::table('posts_posts_images')->where('id_posts', $request->id_posts)->delete();
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
        }
        //edit stress
        if($request->stress == true){
            $stress = DB::table('posts_posts_stress')->where('id_posts', $request->id_posts)->first();
            if(empty($stress)){
                PostsAddStress::postsAddStress('posts_posts', $db_posts->id_category, $request->id_posts);
            }
        }   else    {
            DB::table('posts_posts_stress')->where('id_posts', $request->id_posts)->delete();
        }
    }
    
    //function for append images
    public static function postsEdit1($request){
        
        //database posts
        $db_posts = DB::table('posts_posts')->where('id', $request->id_posts)->first();
        //edit value
        if($request->category !== null){
            DB::table('posts_posts')->where('id', $request->id_posts)->update(['id_category' => $request->category]);
        }
        if($request->name['en'] !== null){
            DB::table('posts_posts')->where('id', $request->id_posts)->update(['name_en' => $request->name['en']]);
        }
        if($request->name['vn'] !== null){
            DB::table('posts_posts')->where('id', $request->id_posts)->update(['name_vn' => $request->name['vn']]);
        }
        DB::table('posts_posts')->where('id', $request->id_posts)->update(['value_en' => $request->value['en'], 'value_vn' => $request->value['vn']]);
        //edit subtitle
        DB::table('posts_subtitle')->where('id_posts', $request->id_posts)->update(['value_en' => $request->sub['en'], 'value_vn' => $request->sub['vn']]);
        //edit image
        if($request->hasFile('images')){
            //CmsImagesUpdate::imagesAppend($request, 'posts_posts', $request->id_posts);
            $this->imagesAppend($request, 'posts_posts', $request->id_posts);
        }
        if($request->checkbox !== null){
            //CmsImagesDelete::imagesDeleteSingleTable($request, 'posts_posts');
            $this->imagesDeleteSingleTable($request, 'posts_posts');
        }
        if($request->date !== null){
            $db_date = $db_posts->created_at;
            $db_date_sub = explode(" ", $db_date);
            $db_date_new = $request->date . " " . $db_date_sub[1];
            DB::table('posts_posts')->where('id', $request->id_posts)
                ->update(['created_at' => $db_date_new]);
        }
        //edit stress
        if($request->stress == true){
            $stress = DB::table('posts_posts_stress')->where('id_posts', $request->id_posts)->first();
            if(empty($stress)){
                PostsAddStress::postsAddStress('posts_posts', $db_posts->id_category, $request->id_posts);
            }
        }   else    {
            DB::table('posts_posts_stress')->where('id_posts', $request->id_posts)->delete();
        }
    }
    
    /*fix edit image*/
    private function imagesAppend($request, $table, $id_posts){
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
                $this->thumbnail($image_path);
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
                $this->thumbnail($image_path);
            }
        }
    }
    
    private function imagesDeleteSingleTable($request, $table){
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
            $this->deleteThumbnail($value['path']);
            //delete database
            DB::table($table_images)->where('id', $value['id'])->delete();
        }
    }
    
    /*Tool*/
    private function thumbnail($image_path){
        //thumbnail
        $tb_select_path = public_path($image_path);
        Resize::path($tb_select_path)->width(350)->do();
    }
    private function deleteThumbnail($image_path){
        unlink( public_path(str_replace(
            substr($image_path,strrpos($image_path,'.')), 
            '_resize' . substr($image_path,strrpos($image_path,'.')), 
            $image_path
        )));
    }
}