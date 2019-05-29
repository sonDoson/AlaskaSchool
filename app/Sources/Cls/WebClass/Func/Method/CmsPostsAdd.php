<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Sources\Cls\WebClass\Func\Method\CmsTotalPostEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsSubtitle;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesUpload;// wrong database
use App\Sources\Cls\WebClass\Func\Method\PostsAddStress;
use Illuminate\Support\Facades\Validator;
use App\Sources\Cls\WebClass\Func\Tool\Resize;

class CmsPostsAdd{
    public static function postsAdd($request){
        //validator
        $validator = Validator::make($request->all(), [

        ],[

        ]);
        if($validator->fails()) {
            return [$validator->errors(), $request->all()];
        }   else    {
            //add value - add get id
            $id_posts = DB::table("posts_posts")->insertGetId([
                            'id_category' => $request->id_category,
                            'name_en' => $request->name['en'],
                            'name_vn' => $request->name['vn'],
                            'value_en' => $request->value['en'],
                            'value_vn' => $request->value['vn'],
                            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
                        ]);
            //edit total posts
            CmsTotalPostEdit::postsTotalEdit("posts_category", $request->id_category, 1);
            //add subtitle
            if(isset($request->sub)){
                CmsSubtitle::postsSubtitleAdd("posts_subtitle", $id_posts, $request->sub['en'], $request->sub['vn']);
            }
            //add image
            if($request->hasFile('images')){
                $images = $request->file('images');
                foreach($images as $key => $image){
                    $extension = strtolower($image->getClientOriginalExtension());
                    //name
                    $name = $id_posts . '_' . $key . '.' . $extension;
                    //path
                    $path = '/uploads/images/posts_posts';
                    $destinationPath = public_path($path);
                    $image->move($destinationPath, $name);
                    //Store database
                    $table_images = 'posts_posts_images';
                    $image_path = $path . '/' . $name;
                    DB::table($table_images)->insert(
                        ['id_posts' => $id_posts, 'image_name' => $name, 'image_path' => $image_path]
                    );
                    //thumbnail
                    $tb_select_path = public_path($image_path);
                    Resize::path($tb_select_path)->width(350)->do();
                }
            }
            //add stress
            $table_stress = "posts_posts";
            if($request->stress == true){
                PostsAddStress::postsAddStress($table_stress, $request->id_category, $id_posts);
            }
            return 0;
        }
    }
}