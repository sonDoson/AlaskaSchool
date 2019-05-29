<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\Tool\StrToLow;

class ControllerRun extends Controller
{
    /*
        - done - Add posts
        - done - Delete Posts
        - done - Add images to old post
        - done - Edit delete some images
        
        - done - lower extension 1/4
        
        VIEW
    */
    
    public function getRun(){
        StrToLow::DB('posts_posts_images')->go();
        echo "done";
    }
}
