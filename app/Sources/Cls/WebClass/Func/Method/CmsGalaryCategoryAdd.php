<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesUpload;
use App\Sources\Cls\WebClass\Func\Method\CmsSubtitle;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CmsGalaryCategoryAdd{
    
    public static function categoryAdd($request){
        //validator
        $validator = Validator::make($request->all(), [
            'name.vn' => 'unique:galary_category,name_vn'
        ],[
            'name.vn.unique' => 'Danh mục đã tồn tại'
        ]);
        if($validator->fails()) {
            return [$validator->errors(), $request->all()];
        }
        //add get ID
        $id_posts = DB::table('galary_category')->insertGetId([
                    'id' => $request->id_category,
                    'name_en' => $request->name['en'],
                    'name_vn' => $request->name['vn'],
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
              ]);
        //add images
        CmsImagesUpload::imagesUploadCategory($request, "galary_category", $id_posts);
        //add subtitle
        CmsSubtitle::postsSubtitleAdd("galary_category_subtitle", $id_posts, $request->sub['en'], $request->sub['vn']);
        //create total row
        DB::table('galary_total')->insert([
            'table_name' => 'galary_category',
            'id_category' => $id_posts,
            'num_posts' => 0,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        return 0;
    }
    
}