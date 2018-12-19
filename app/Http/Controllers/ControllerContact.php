<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\ClientContact;
use App\Sources\Cls\WebClass\Func\Category;
use App\Sources\Cls\WebClass\Func\Method\PostsGetItems;
use App\Sources\Cls\WebClass\Func\Method\PostsGetStress;
use App\Sources\Cls\Config\Config;
use DB;

class ControllerContact extends Controller
{
    public function getContact(){
        //section
        $lang_section = Config::configLanguage();
        $lang[] = 'name_' . $lang_section;
        $lang[] = 'value_' . $lang_section;
        //contact
        $contact = ClientContact::getContact();
        //category
        $category = Category::categoryGet('posts_category');
        foreach($category as $i => $value){
            $category_item[$i] = PostsGetItems::postsGetItems('posts_posts', $i, 5);// order by cat
        }
        //section 0
        $section_0 = PostsGetItems::postsGetItems('posts_posts', 1);
        $link = DB::table('video_link')->where('id',1)->first();
        $link = $link->value;
        //section 1
        $section_1 = PostsGetItems::postsGetItems('posts_posts', 4);
        //section 2
        $section_2 = PostsGetStress::postsGetStress('posts_posts');
        return view('client.content.contact', compact('lang', 'contact', 'category', 'category_item', 'section_0', 'link', 'section_1', 'section_2'));
    }
}
