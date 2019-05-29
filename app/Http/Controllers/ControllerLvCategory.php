<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Category;
use App\Sources\Cls\WebClass\Func\Method\PostsGetItems;
use App\Sources\Cls\Config\Config;
use App\Sources\Cls\WebClass\Func\ClientContact;
use App\Sources\Cls\WebClass\Func\ClientItem;
use DB;

class ControllerLvCategory extends Controller
{
    public function getCategoryList(Request $request, $id){
        //transtate id
        $id  = DB::table('posts_category')->select('id')->where('name_vn', $id)->first();
        $id = $id->id;
        //contact
        $contact = ClientContact::getContact();
        //section
        $lang_section = Config::configLanguage();
        $lang[] = 'name_' . $lang_section;
        $lang[] = 'value_' . $lang_section;
        $lang[] = 'subtitle_' . $lang_section;
        //static text
        $db_static_text = DB::table('static_text_client')->get();
        $static_text = array();
        foreach($db_static_text as $key => $value){
            $static_text[$value->id_text][$value->id]['value_en'] = $value->value_en;
            $static_text[$value->id_text][$value->id]['value_vn'] = $value->value_vn;
        }
        //nav
        $category = Category::categoryGet('posts_category');
        foreach($category as $i => $value){
            $category_item[$i] = PostsGetItems::postsGetItems('posts_posts', $i, 5);
        }
        //section 0
        $section_0 = PostsGetItems::postsGetItems('posts_posts', $id, 12);
        //section 1 deleted
        //section extend
        $section_3 = null;
        if($id == 3){
            $section_3 = ClientItem::getListItem('registration', 1);
        }   elseif($id == 5)    {
            $section_3 = ClientItem::getListItem('registration', 2);
        }
        return view('client.content.lv_category', compact('static_text', 'lang_section',
            'lang', 'contact', 'category', 
            'section_3', 'section_0', 'category_item', 'id'));
    }
}
