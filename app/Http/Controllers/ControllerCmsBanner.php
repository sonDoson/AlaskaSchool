<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsUser;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesUpload;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesDelete;
use DB;

class ControllerCmsBanner extends Controller
{
    public function getCmsBanner(){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(4, 'view');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        //
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        //old_images
        $images = DB::table('banner_images')->get();
        //var_dump($user);
        return view('cms.content.banner_home', compact('menu', 'layout', 'name_class', 'images'));
    }
    public function postCmsBanner(Request $request){
        //add more images
        CmsImagesUpload::imagesUploadSingleTable($request, 'banner');
        //delete checked image
        if($request->checkbox[0] !== null){
            CmsImagesDelete::imagesDeleteSingleTable($request, 'banner');
        }
        return redirect()->back();
    }
}
