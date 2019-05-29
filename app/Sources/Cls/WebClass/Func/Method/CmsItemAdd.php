<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Sources\Cls\WebClass\Func\Method\CmsTotalPostEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsSubtitle;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesUpload;
use App\Sources\Cls\WebClass\Func\Method\PostsAddStress;

class CmsItemAdd{
    public static function addItem($table, $request){
        //defind table
        $table_posts = $table . "_posts";
        $table_subtitle = $table . "_subtitle";
        $table_total = $table . "_total";
        //add item get id
        $id_posts = DB::table($table_posts)->insertGetId([
                        'id_category' => $request->category,
                        'name_en' => $request->name['en'],
                        'name_vn' => $request->name['vn'],
                        'value_en' => $request->value['en'],
                        'value_vn' => $request->value['vn'],
                        'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                        'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
                    ]);
        //add subtitle
        if(isset($request->sub)){
            CmsSubtitle::postsSubtitleAdd($table_subtitle, $id_posts, $request->sub['en'], $request->sub['vn']);
        }
        //add image
        CmsImagesUpload::imagesUpload($request, $table, $id_posts);
        //add stress
        if($request->stress == true){
            PostsAddStress::postsAddStress($table_stress, $request->category, $id_posts);
        }
        //add total
        CmsTotalPostEdit::totalEdit($table_total, $request->category, 1);
        //return
        return 0;
    }
}