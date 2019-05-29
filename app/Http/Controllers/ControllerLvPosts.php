<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Category;
use App\Sources\Cls\WebClass\Func\Method\PostsGetItems;
use App\Sources\Cls\WebClass\Func\Method\PostsGetSingleItem;
use App\Sources\Cls\Config\Config;
use App\Sources\Cls\WebClass\Func\ClientContact;
use App\Sources\Cls\WebClass\Func\Method\PostsGetStress;
use DB;

class ControllerLvPosts extends Controller
{
    public function getPosts(Request $request, $id_cat, $id_pos){
        //transtate id
        $id_cat  = DB::table('posts_category')->select('id')->where('name_vn', $id_cat)->first();
        $id_cat = $id_cat->id;
        $id_pos  = DB::table('posts_posts')->select('id')->where('name_vn', $id_pos)->first();
        $id_pos = $id_pos->id;
        //contact
        $contact = ClientContact::getContact();
        //section
        $lang_section = Config::configLanguage();
        $lang[] = 'name_' . $lang_section;
        $lang[] = 'value_' . $lang_section;
        $lang[] = 'subtitle_' . $lang_section;
        $lang[] = 'category_' . $lang_section;
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
            $category_item[$i] = PostsGetItems::postsGetItemsNoName('posts_posts', $i, 5);// order by cat
        }
        //right nav
        //section 0
        $section_0 = PostsGetSingleItem::postsGetSingleItem('posts_posts', $id_pos);
        //section 1
        $section_1 = PostsGetItems::postsGetItems('posts_posts', 4);
        //right side
        $stress = PostsGetStress::postsGetStress('posts_posts', 5);
        //shortcut
        $db_shortcut = db::table('shotcut_link')->where('flag', 1)->get();
        $shortcut = array();
        foreach($db_shortcut as $key => $value){
            $shortcut[$key]['url'] = $value->url;
            $shortcut[$key]['name_en'] = $value->name_en;
            $shortcut[$key]['name_vn'] = $value->name_vn;
        }
        return view('client.content.lv_posts', compact('static_text', 'lang_section',
            'lang', 'contact', 'category', 'section_1',
            'section_0', 'stress', 'category_item', 'id_cat', 'shortcut'));
    }
}
