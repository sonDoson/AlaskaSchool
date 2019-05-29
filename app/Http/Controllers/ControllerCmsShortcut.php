<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsUser;
use App\Sources\Cls\WebClass\Func\ShortCut;
use DB;

class ControllerCmsShortcut extends Controller
{
    public function getCmsShortcutEdit(){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(4, 'view');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        //
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        //data list
        $db_list = DB::table('shotcut_link')->get();
        return view('cms.content.shortcut_edit', compact('menu', 'layout', 'name_class', 'db_list'));
    }
    public function postCmsShortcutEdit(Request $request){
        ShortCut::editShortcut($request->all());
        return redirect()->back();
    }
}
