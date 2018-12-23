<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Cms;
use App\Sources\Cls\WebClass\Func\CmsPosts;
use App\Sources\Cls\WebClass\Func\ClientContact;
use App\Sources\Cls\WebClass\Func\CmsUser;
use DB;

class ControllerCmsPostsStaticPosts extends Controller
{
    public function getCmsPostsStaticPostsList(Request $request){
        //validator user role
        $user_validator = CmsUser::userRoleValidator(4, 'view');
        $user_validator_all = CmsUser::userRoleValidatorAll(4);
        if($user_validator === 0){return redirect()->route('getCmsRollBack');}
        //
        $menu = Cms::menu();
        $name_class = "list";
        $route = "Static-Posts";
        return view('cms.content.posts_static_posts_list', compact('user_validator_all', 'menu', 'name_class', 'route'));
    }
    public function getCmsContactEdit(){
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        $db_contact = ClientContact::getContact();
        return view('cms.content.contact_edit', compact('menu', 'layout', 'name_class', 'db_contact'));
    }
    public function postCmsContactEdit(Request $request){
        $total_value[0]['name'] = 'facebook';
        $total_value[0]['value'] = $request->facebook;
        $total_value[1]['name'] = 'youtube';
        $total_value[1]['value'] = $request->youtube;
        $total_value[2]['name'] = 'instagram';
        $total_value[2]['value'] = $request->instagram;
        $total_value[3]['name'] = 'map';
        $total_value[3]['value'] = $request->map;
        foreach($total_value as $value){
            if($value['value'] !== null){
                DB::table('contact')->where('id', 1)->update([$value['name'] => $value['value']]);
            } 
        }
        DB::table('contact')->where('id', 1)->update(['value_en' => $request->value['en']]);
        DB::table('contact')->where('id', 1)->update(['value_vn' => $request->value['vn']]);
        if($request->phone !== null){
            DB::table('contact_ex')->where('id', 1)->update(['phone' => $request->phone]);
        }
        if($request->address !== null){
            DB::table('contact_ex')->where('id', 1)->update(['address' => $request->address]);
        }
        if($request->email !== null){
            DB::table('contact_ex')->where('id', 1)->update(['email' => $request->email]);
        }
        if($request->fax !== null){
            DB::table('contact_ex')->where('id', 1)->update(['fax' => $request->fax]);
        }
        return redirect()->route('getCmsPostsStaticPostsList');
    }
    public function getCmsFooterTextEdit(){
        $menu = Cms::menu();
        $name_class = "list";
        $layout = "WebUserPost.css";
        $db_contact = ClientContact::getContact();
        return view('cms.content.footer_text', compact('menu', 'layout', 'name_class', 'db_contact'));
    }
    public function postCmsFooterTextEdit(Request $request){
        DB::table('contact_ex')->where('id', 1)->update(['value_en' => $request->value['en']]);
        DB::table('contact_ex')->where('id', 1)->update(['value_vn' => $request->value['vn']]);
        return redirect()->route('getCmsPostsStaticPostsList');
    }
}
