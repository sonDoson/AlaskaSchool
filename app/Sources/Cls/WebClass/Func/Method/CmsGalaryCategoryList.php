<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesUpload;
use App\Sources\Cls\WebClass\Func\Method\CmsSubtitle;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CmsGalaryCategoryList{
    
    public static function categoryList($request){
        //index
        $index = 0;
        if(isset($request['page'])){ $index = $request['page'] - 1; }
        $item = 10;
        $skip = $index * $item;
        //default soft
        $soft['key'] = "updated_at";
        $soft['value'] = "desc";
        //request soft
        if(isset($request['soft'])){
            $soft_explode = explode("-", $request['soft']);
            $soft['key'] = $soft_explode[0];
            $soft['value'] = $soft_explode[1];
        }
        //get name
        if(!isset($request['search'])){
            $db_category = DB::table('galary_category')->orderBy($soft['key'], $soft['value'])
                           ->skip($skip)->take($item)->get();
        }   else    {
            $db_category = DB::table('galary_category')
                           ->where('name_vn', 'like', '%' . $request['search'] . '%')
                           ->orderBy($soft['key'], $soft['value'])->skip($skip)->take($item)->get();
        }
        //get total
        $db_total = DB::table('galary_total')->get();
        $category_total = array();
        foreach($db_total as $k => $value){
            $category_total[$value->id_category] = $value->num_posts;
        }
        //mixing data
        $return = array();
        foreach($db_category as $key => $value){
            $return[$key]['id'] = $value->id;
            $return[$key]['name_vn'] = $value->name_vn;
            $return[$key]['num_posts'] = $category_total[$value->id];
            $return[$key]['created_at'] = $value->created_at;
        }
        //return
        return $return;
    }
    
}