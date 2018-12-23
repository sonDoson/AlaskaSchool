<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsItem;
use App\Sources\Cls\WebClass\Func\CmsUser;
use DB;

class ControllerCmsPostsMessage extends Controller
{
    public function getCmsPostsMessageList(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(4, 'view');
        $user_validator_all = CmsUser::userRoleValidatorAll(4);
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        //
        $menu = Cms::menu();
        $name_class = "list";
        $route = "Message";
        return view('cms.content.posts_message_list', compact('user_validator_all', 'menu', 'name_class', 'route'));
    }
    public function getCmsPostsMessageEdit(Request $request){
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        $db_item = CmsItem::getItem($request->id, 'posts_static', null, 1);
        return view('cms.content.posts_static_edit', compact('menu', 'layout', 'name_class', 'db_item'));
    }
    public function postCmsPostsMessageEdit(Request $request){
        CmsItem::itemEdit($request, 'posts_static', $request->id_posts);
        return redirect()->route('getCmsPostsMessageList');
    }
}
