<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CmsUserRoleAdd{
    
    public static function userRoleAdd($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:user_role_name',
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Vai trò đã tồn tại'
        ]);
        if($validator->fails()) {
            return [$validator->errors(), $request->all()];
        }   else    {
            $id_role = DB::table('user_role_name')->insertGetId(
                [
                    'name' => $request->name
                ]
            );
            
            foreach($request->role as $key => $value){
                DB::table('user_role')->insert([
                    'id_role' => $id_role,
                    'id_menu' => $key,
                    'view' => (isset($value['view']['checked'])) ? 1 : 0,
                    'add' => (isset($value['add']['checked'])) ? 1 : 0,
                    'edit' => (isset($value['edit']['checked'])) ? 1 : 0,
                    'delete' =>(isset($value['delete']['checked'])) ? 1 : 0,
                ]);
            }
            return 0;
        }
    }
}