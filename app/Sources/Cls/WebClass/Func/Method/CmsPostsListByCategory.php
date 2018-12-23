<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsPostsCategoryInfo;

class CmsPostsListByCategory{
    public static function postsListByCategory($id_category, $request = null){
        //index
        $index = 0;
        if(isset($request['page'])){ $index = $request['page'] - 1; }
        $item = 10;
        $skip = $index * $item;
        //default soft
        $soft['key'] = "id";
        $soft['value'] = "desc";
        //request soft
        if(isset($request['soft'])){
            $soft_explode = explode("-", $request['soft']);
            $soft['key'] = $soft_explode[0];
            $soft['value'] = $soft_explode[1];
        }
        
        $category = CmsPostsCategoryInfo::postsListCategoryInfo($id_category);
        if(!isset($request['search'])){
            $db_posts = DB::table('posts_posts')
                        ->where('id_category', $id_category)
                        ->orderBy($soft['key'], $soft['value'])->skip($skip)->take($item)->get();
        }   else    {
            $en_posts = DB::table('posts_posts')->where('id_category', $id_category)
                        ->where('name_en', 'like', '%' . $request['search'] . '%');
            $id_posts = DB::table('posts_posts')->where('id_category', $id_category)
                        ->where('id', 'like', '%' . $request['search'] . '%');
            $db_posts = DB::table('posts_posts')->where('id_category', $id_category)
                        ->where('name_vn', 'like', '%' . $request['search'] . '%')->union($id_posts)->union($en_posts)
                        ->orderBy($soft['key'], $soft['value'])->skip($skip)->take($item)->get();
        }
        //mixing data
        $return = array();
        foreach($db_posts as $key => $value){
            $return[$value->id]['category_en'] = $category[$value->id_category]['name_en'];
            $return[$value->id]['category_vn'] = $category[$value->id_category]['name_vn'];
            $return[$value->id]['name_en'] = $value->name_en;
            $return[$value->id]['name_vn'] = $value->name_vn;
            $return[$value->id]['created'] = $value->created_at;
        }
        return $return;
    }
}