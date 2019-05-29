<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsFilesEdit;

class CmsAdmisstionEdit{
    public static function admisstionEdit($request){
        if($request->name['vn'] !== null){
            DB::table('registration_posts')->where('id', $request->id_posts)
                ->update(['name_vn' => $request->name['vn']]);
        }
        if($request->name['en'] !== null){
            DB::table('registration_posts')->where('id', $request->id_posts)
                ->update(['name_en' => $request->name['en']]);
        }
        //edit images
        CmsImagesEdit::imagesEdit($request, 'registration', $request->id_posts);
        //edit form
        CmsFilesEdit::fileEditSingle($request, 'registration', $request->id_posts);
        //edit subtile
        DB::table('registration_subtitle')->where('id_posts', $request->id_posts)
            ->update(['value_vn' => $request->sub['vn'], 'value_en' => $request->sub['en']]);
        //edit value
        DB::table('registration_posts')->where('id', $request->id_posts)
            ->update(['value_vn' => $request->value['vn'], 'value_en' => $request->value['en']]);
        //checkbox
        if($request->stress == true){
            DB::table('registration_files')->where('id_posts', $request->id_posts)
                ->update(['file_path' => 'empty']);
        }
    }
}