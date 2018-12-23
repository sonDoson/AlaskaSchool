<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsUser;
use App\Sources\Cls\WebClass\Func\CmsAdmissions;

class ControllerCmsRecruiment extends Controller
{
    public function getCmsRecruimentList(){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(2, 'view');
        $user_validator_all = CmsUser::userRoleValidatorAll(2);
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        //
        $menu = Cms::menu();
        $category = DB::table('registration_category')->where('id', 2)->first();
        $list = CmsAdmissions::admissionsList(2);
        $name_class = "list";
        return view('cms.content.admissions_list', compact('user_validator_all', 'menu', 'name_class', 'list', 'category'));
    }
}
