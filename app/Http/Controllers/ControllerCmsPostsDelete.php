<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\CmsPosts;

class ControllerCmsPostsDelete extends Controller
{
    public function postCmsPostsDelete(Request $request){
        $id_posts = $request->value;
        //do delete
        $delete = CmsPosts::postsDelete($id_posts);
        return redirect()->back();
    }
}
