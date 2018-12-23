<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsUser;
use App\Sources\Cls\WebClass\Func\CmsAdmissions;

class ControllerCmsAdmissions extends Controller
{
    public function getCmsAdmissionsList(){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(3, 'view');
        $user_validator_all = CmsUser::userRoleValidatorAll(3);
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        //
        $menu = Cms::menu();
        $category = DB::table('registration_category')->where('id', 1)->first();
        $list = CmsAdmissions::admissionsList(1);
        $name_class = "list";
        return view('cms.content.admissions_list', compact('user_validator_all', 'menu', 'name_class', 'list', 'category'));
    }
    public function getCmsAdmissionsEditForm(Request $request){
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        $db_posts = CmsAdmissions::admisstionGetPosts($request->id);
        return view('cms.content.admissions_form_edit', compact('menu', 'layout', 'name_class', 'db_posts'));
    }
    public function postCmsAdmissionsEditForm(Request $request){
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        $return = CmsAdmissions::admisstionEdit($request);
        if($request->id == 3){
            return redirect()->route('getCmsRecruimentList');
        }   else    {
            return redirect()->route('getCmsAdmissionsList');
        }
    }
}
