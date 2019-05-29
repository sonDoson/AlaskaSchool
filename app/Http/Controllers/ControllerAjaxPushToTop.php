<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sources\Cls\WebClass\Func\PushToTop;

class ControllerAjaxPushToTop extends Controller
{
    public function getPush(Request $request){
        
        $value = PushToTop::update_time($request->table, $request->id);
        var_dump($value);
    }
}
