<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsUser;
use App\Sources\Cls\WebClass\Func\CmsGalary;
use App\Sources\Cls\WebClass\Func\CmsItem;
use App\Sources\Cls\WebClass\Func\PageMode;
use DB;

class ControllerCmsGalary extends Controller
{
    public function getCmsGalaryCategoryList(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(20, 'view');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        $user_validator_all = CmsUser::userRoleValidatorAll(20);
        $menu = Cms::menu();
        $name_class = "list";
        $db_list = CmsGalary::categoryList($request->all());
        $total_category = DB::table('galary_category')->select('id')->get();
        //page mode
        $page_mode = new PageMode(5, 10, sizeof($total_category), 4);
        $page_round = $page_mode->page_round($request->page);
        return view('cms.content.galary_category_list', compact('user_validator_all', 'page_round', 'page_mode', 'menu', 'name_class', 'db_list'));
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
    public function getCmsGalaryEdit(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(5, 'edit');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        $menu = Cms::menu();
        $layout = "WebUserPost.css";
        $name_class = "list";
        $id = $request->id;
        $db_category = CmsGalary::categoryGet($request->id);
        return view('cms.content.galary_category_edit', compact('menu', 'layout', 'name_class', 'id', 'db_category'));
    }
    public function postCmsGalaryCategoryEdit(Request $request){
        $return = CmsGalary::galaryCategoryEdit($request, 'galary_category');
        if($return !== 0){
            return redirect()->back()->withErrors($return[0]);
        }   else    {
            return redirect()->route('getCmsGalaryCategoryList');
        }
    }
    public function postCmsGalaryCategoryDelete(Request $request){
        $return = CmsGalary::galaryCategoryDelete('galary', $request->value);
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
        $db_list = CmsItem::itemList('galary', $request->all());
        //page mode
        //total
        
        if($request->id_category == 0 || !isset($request->id_category)){
            $total = DB::table('galary_total')->sum('num_posts');
            $total = intval($total);
        }   else    {
            $total = DB::table('galary_total')->where('id_category', $request->id_category)
                     ->select('num_posts')->first();
            $total = $total->num_posts;
        }
        
        $page_mode = new PageMode(5, 10, $total, 4);
        $page_round = $page_mode->page_round($request->page);
        //category
        $category = DB::table('galary_category')->select('id', 'name_vn')->get();
        return view('cms.content.galary_posts_list', compact('user_validator_all', 'menu', 'category', 'page_round', 'page_mode', 'name_class', 'db_list'));
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
        $return = CmsItem::addItem('galary', $request);
        if($return !== 0){
            return redirect()->back()->withErrors($return[0]);
        }   else    {
            return redirect()->route('getCmsGalaryPostsList');
        }
    }
    public function getCmsGalaryPostsEdit(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(5, 'edit');
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        $menu = Cms::menu();
        $layout = "WebUserPost.css";
        $name_class = "list";
        $db_category = DB::table('galary_category')->get();
        $db_item = CmsItem::getItem($request->id, 'galary', null, 1);
        $images = DB::table('galary_images')->where('id_posts', $request->id)->get();
        return view('cms.content.galary_posts_edit', compact('menu', 'layout', 'images', 'name_class', 'db_category', 'db_item'));
    }
    public function postCmsGalaryPostsEdit(Request $request){
        $return = CmsItem::editItem('galary', $request);
        if($return !== 0){
            return redirect()->back()->withErrors($return[0]);
        }   else    {
            return redirect()->back()->withErrors(['Thay đổi thành công!']);
        } 
    }
    public function postCmsGalaryPostsDelete(Request $request){
        $return = CmsItem::deleteItem('galary', $request->value);
        if($return !== 0){
            return redirect()->back()->withErrors($return[0]);
        }   else    {
            return redirect()->route('getCmsGalaryPostsList');
        }
    }
}
