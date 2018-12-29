<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;

class CmsTotalPostEdit{
    public static function postsTotalEdit($table_name, $id_category, $action){
        $db_total = DB::table('total_posts')
                    ->where('table_name', $table_name)
                    ->where('id_category', $id_category)
                    ->first();
        $num_posts = $db_total->num_posts + $action;
        DB::table('total_posts')->where('table_name', $table_name)
        ->where('id_category', $id_category)
        ->update(['num_posts' => $num_posts]);
    }
    public static function totalEdit($table_total, $id_category, $action){
        $db_total = DB::table($table_total)->where('id_category', $id_category)->first();
        $num_posts = $db_total->num_posts + $action;
        DB::table($table_total)
        ->where('id_category', $id_category)
        ->update(['num_posts' => $num_posts]);
    }
}