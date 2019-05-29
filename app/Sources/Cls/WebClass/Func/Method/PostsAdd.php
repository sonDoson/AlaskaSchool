<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use App\Sources\Cls\WebClass\Func\Method\PostsImagesAdd;
use App\Sources\Cls\WebClass\Func\Method\PostsAddStress;
use App\Sources\Cls\WebClass\Func\Method\TotalPostsAdd;

class PostsAdd{
    public static function postsAdd($request, $table, $images = 0){
        if($images == 0){
            $validator = Validator::make($request->all(), 
            [
                'name.vn' => 'required',
                'value.vn' => 'required'
            ],
            [
                //'name.en.required' => 'Vui long nhap ten tieng Anh',
                'name.vn.required' => 'Vui long nhap ten tieng Viet',
                //'value.en.required' => 'Vui long nhap noi dung tieng Anh',
                'value.vn.required' => 'Vui long nhap noi dung tieng Viet'
            ]);
            if($validator->fails()) {
                return $validator->messages;
            }   else    {
                $id = DB::table($table)->insertGetId(
                    [
                        'id_category'   => $request->category,
                        'name_en'       => $request->name['en'],
                        'name_vn'       => $request->name['vn'],
                        'value_en'      => $request->value['en'],
                        'value_vn'      => $request->value['vn'],
                        'created_at'    => Carbon::now('Asia/Ho_Chi_Minh'),
                        'updated_at'    => Carbon::now('Asia/Ho_Chi_Minh')
                    ]
                );
                
                //add num_posts
                $table_name_cat = substr_replace($table, "category", -5);
                TotalPostsAdd::totalPostsAdd($table_name_cat, $request->category);
                //add stress
                if($request->stress == true){
                    PostsAddStress::postsAddStress($table, $request->category, $id);
                }
                return null;
            }
        }   else    {
            $validator = Validator::make($request->all(), 
            [
                'name.vn' => 'required',
                'value.vn' => 'required'
            ],
            [
                //'name.en.required' => 'Vui long nhap ten tieng Anh',
                'name.vn.required' => 'Vui long nhap ten tieng Viet',
                //'value.en.required' => 'Vui long nhap noi dung tieng Anh',
                'value.vn.required' => 'Vui long nhap noi dung tieng Viet'
            ]);
            if($validator->fails()) {
                return $validator;
            }   else    {
                $id = DB::table($table)->insertGetId(
                    [
                        'id_category'   => $request->category,
                        'name_en'       => $request->name['en'],
                        'name_vn'       => $request->name['vn'],
                        'value_en'      => $request->value['en'],
                        'value_vn'      => $request->value['vn'],
                        'created_at'    => Carbon::now('Asia/Ho_Chi_Minh'),
                        'updated_at'    => Carbon::now('Asia/Ho_Chi_Minh')
                    ]
                );
                //images
                PostsImagesAdd::postsImagesAdd($request, $table, $id, 1);
                //add num_posts
                $table_name_cat = substr_replace($table, "category", -5);
                TotalPostsAdd::totalPostsAdd($table_name_cat, $request->category);
                //add stress
                if($request->stress == true){
                    PostsAddStress::postsAddStress($table, $request->category, $id);
                }
                return null;
            }
        }
    }
}