<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsPosts;
use App\Sources\Cls\WebClass\Func\PageMode;
use App\Sources\Cls\WebClass\Func\CmsUser;
use DB;

class ControllerCmsPostsEnrollmentInformation extends Controller
{
    public function getCmsPostsEnrollmentInformationList(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(4, 'view');
        $user_validator_all = CmsUser::userRoleValidatorAll(4);
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        //
        $menu = Cms::menu();
        $name_class = "list";
        $category = DB::table('posts_category')->where('id', 3)->first();
        $route = "Enrollment-Information";
        $db_list = CmsPosts::postsListByCategory(3, $request->all());
        $page_mode = new PageMode(5, 10, 'posts_category', 4);
        $page_round = $page_mode->page_round($request->page);
        return view('cms.content.posts_news_list', compact('user_validator_all', 'menu', 'page_round', 'page_mode', 'name_class', 'route', 'category', 'db_list'));
    }
    public function getCmsPostsEnrollmentInformationAdd(){
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        $id_category = 3;
        $category = DB::table('posts_category')->where('id', $id_category)->first();
        return view('cms.content.posts_news_add', compact('menu', 'layout', 'name_class', 'category'));
    }
}
