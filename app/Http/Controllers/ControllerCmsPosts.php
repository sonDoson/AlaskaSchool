<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsPosts;
use App\Sources\Cls\WebClass\Func\CmsUser;
use App\Sources\Cls\WebClass\Func\PageMode;
use DB;

class ControllerCmsPosts extends Controller
{
    public function getCmsPostsList(){
        $menu = Cms::menu();
        $name_class = "list";
        $db_list = CmsPosts::postsList();
        
        return view('cms.content.posts_list', compact('menu', 'name_class', 'db_list'));
    }
    //new
    public function getCmsPostsNewsList(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(4, 'view');
        $user_validator_all = CmsUser::userRoleValidatorAll(4);
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        //
        $menu = Cms::menu();
        $name_class = "list";
        $route = "Events-and-news";
        $category = DB::table('posts_category')->where('id', 4)->first();
        $page_mode = new PageMode(5, 10, 'posts_category', 4);
        $page_round = $page_mode->page_round($request->page);
        $db_list = CmsPosts::postsListByCategory(4, $request->all());
        return view('cms.content.posts_news_list', compact('user_validator_all', 'menu', 'page_round', 'page_mode', 'name_class', 'route', 'category', 'db_list'));
    }
    public function getCmsPostsNewsAdd(){
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        $id_category = 4;
        $category = DB::table('posts_category')->where('id', $id_category)->first();
        return view('cms.content.posts_news_add', compact('menu', 'layout', 'name_class', 'category'));
    }
    public function postCmsPostsNewsAdd(Request $request){
        $return = CmsPosts::postsAdd($request);
        if($return !== 0){
            return redirect()->back()->withErrors($return[0]);
        }   
        if($request->id_category == 1){
            return redirect()->route('getCmsPostsPresentList');
        }
        if($request->id_category == 2){
            return redirect()->route('getCmsPostsProgramsList');
        }
        if($request->id_category == 3){
            return redirect()->route('getCmsPostsEnrollmentInformationList');
        }
        if($request->id_category == 4){
            return redirect()->route('getCmsPostsNewsList');
        }
        if($request->id_category == 5){
            return redirect()->route('getCmsPostsRecruitmentList');
        }
    }
    public function getCmsPostsNewsEdit(Request $request){
        $request = $request->all();
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        $db_item = CmsPosts::postsItem($request['id']);
        return view('cms.content.posts_news_edit', compact('menu', 'layout', 'name_class', 'db_item'));
    }
    public function postCmsPostsNewsEdit(Request $request){
        CmsPosts::postsEdit($request);
        return redirect()->route('getCmsPostsNewsList');
    }
}
