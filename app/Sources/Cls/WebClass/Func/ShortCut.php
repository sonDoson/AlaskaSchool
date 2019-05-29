<?php
namespace App\Sources\Cls\WebClass\Func;

use Illuminate\Support\Facades\DB;

class ShortCut{
    public static function editShortcut($requestAll){
        foreach($requestAll['shortcut'] as $key => $value){
            $flag = 1;
            if($value['name_vn'] == null){
                $flag = 0;
                $value['name_vn'] = null;
                $value['name_en'] = null;
                $value['url'] = null;
            }
            DB::table('shotcut_link')->where('id', $key)->update([
                'name_vn' => $value['name_vn'],
                'name_en' => $value['name_en'],
                'url' => $value['url'],
                'flag' => $flag,
            ]);
        }
    }
}