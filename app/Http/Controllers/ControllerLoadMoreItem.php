<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\Config\Config;
use App\Sources\Cls\WebClass\Func\Method\PostsGetItems;

class ControllerLoadMoreItem extends Controller
{
    public function getLoadMoreItem(Request $request){
        //get language
        //section
        $lang_section = Config::configLanguage();
        $lang[] = 'name_' . $lang_section;
        $lang[] = 'value_' . $lang_section;
        $lang[] = 'subtitle_' . $lang_section;
        //get database
        $db = PostsGetItems::postsGetItems('posts_posts', $request->id_cate, 12, $request->p);
        //var_dump($db["Tin Tức & Sự Kiện"]);die();
        //making output
        $output = "";
        foreach(reset($db) as $key => $value){
            $output .= "
                <div class=\"big-news-item col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4\" style=\"margin-top: 20px;\">
                    <a style=\"color: #000\" href=\"" . '/cat/' . $value['id_category']. '/' . $value['id'] . "\">
                        <div class=\"big-news-item-image\" style=\"background-image:url('" . $value['images'][0] . "')\"></div>
                        <div class=\"big-news-item-content font-resize\">
                            <h4>" . $value[$lang[0]] . "</h4>
                            <div  class=\"big-news-item-content-text\">
                                <p>" . $value[$lang[2]] . "</p>
                            </div>
                        </div>
                    </a>
                </div>
            ";
        }
        //return output
        return($output);
    }
}
