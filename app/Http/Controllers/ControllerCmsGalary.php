<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsUser;
use App\Sources\Cls\WebClass\Func\CmsGalary;
use App\Sources\Cls\WebClass\Func\CmsItem;
use DB;

class ControllerCmsGalary extends Controller
{
    public function getCmsGalaryCategoryList(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(5, 'view');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        $user_validator_all = CmsUser::userRoleValidatorAll(5);
        $menu = Cms::menu();
        $name_class = "list";
        $db_list = CmsGalary::categoryList($request->all());
        return view('cms.content.galary_category_list', compact('user_validator_all', 'menu', 'name_class', 'db_list'));
    }
    public function getCmsGalaryCategoryAdd(){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(5, 'add');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        $menu = Cms::menu();
        $layout = "WebUserPost.css";
        $name_class = "list";
        return view('cms.content.galary_category_add', compact('menu', 'layout', 'name_class'));
    }
    public function postCmsGalaryCategoryAdd(Request $request){
        $return = CmsGalary::galaryCategoryAdd($request);
        if($return !== 0){
            return redirect()->back()->withErrors($return[0]);
        }   else    {
            return redirect()->route('getCmsGalaryCategoryList');
        }
    }
    
    //posts
    public function getCmsGalaryPostsList(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(5, 'view');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        $user_validator_all = CmsUser::userRoleValidatorAll(5);
        $menu = Cms::menu();
        $name_class = "list";
        $db_list = "";
        return view('cms.content.galary_posts_list', compact('user_validator_all', 'menu', 'name_class', 'db_list'));
    }
    public function getCmsGalaryPostsAdd(){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(5, 'add');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        $menu = Cms::menu();
        $layout = "WebUserPost.css";
        $name_class = "list";
        $db_category = DB::table('galary_category')->get();
        return view('cms.content.galary_posts_add', compact('menu', 'layout', 'name_class', 'db_category'));
    }
    public function postCmsGalaryPostsAdd(Request $request){
        //$db_total = DB::table('galary_total')->where('id_category', $request->category)->first();
        //$num_posts = $db_total->num_posts + 1;
        //echo($num_posts);
        //die();
        $return = CmsItem::addItem('galary', $request);
        if($return !== 0){
            return redirect()->back()->withErrors($return[0]);
        }   else    {
            return redirect()->route('getCmsGalaryPostsList');
        }
    }
}
