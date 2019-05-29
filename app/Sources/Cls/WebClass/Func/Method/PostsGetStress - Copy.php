<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\PostsGetSingleItem;

class PostsGetStress{
    public static function postsGetStress($table, $number = null){
        if($number == null){
            $list_id = DB::table($table . '_stress')->orderBy('id', 'desc')->get();
        }   else    {
            $list_id = DB::table($table . '_stress')->orderBy('id', 'desc')->take($number)->get();
        }
        $return = array();
        foreach($list_id as $key => $value){
            $return[$value->id_posts] = PostsGetSingleItem::postsGetSingleItemForList($table, $value->id_posts);
        }
        return $return;
    }
}