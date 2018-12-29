<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\PostsGetSingleItem;

class PostsGetItems{
    public static function postsGetItems($table_posts, $id_category, $take = 10, $page = 0){ 
        $skip = $take * $page;
        //get list id
        $list_id = DB::table($table_posts)->select('id')->where('id_category', $id_category )->skip($skip)->take($take)->get();
        //get cate name
        $category_name = DB::table(substr_replace($table_posts, "category", -5))->where('id', $id_category)->first();
        $category_name = $category_name->name_vn;
        $return = array();
        foreach($list_id as $id){
            $return[$category_name][] = PostsGetSingleItem::postsGetSingleItem($table_posts, $id->id);
        }
        return $return;
    }
    public static function postsGetItemsNoName($table_posts, $id_category, $take = 10){ 
        //get list id
        $list_id = DB::table($table_posts)->select('id')->where('id_category', $id_category )->take($take)->get();
        //get cate name
        $category_name = DB::table(substr_replace($table_posts, "category", -5))->where('id', $id_category)->first();
        $category_name = $category_name->name_vn;
        $return = array();
        foreach($list_id as $id){
            $return[] = PostsGetSingleItem::postsGetSingleItem($table_posts, $id->id);
        }
        return $return;
    }
}