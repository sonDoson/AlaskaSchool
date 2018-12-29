<?php
namespace App\Sources\Cls\WebClass\Func;

use App\Sources\Cls\WebClass\Func\Method\CmsGalaryCategoryList;
use App\Sources\Cls\WebClass\Func\Method\CmsGalaryCategoryAdd;

class CmsGalary{
    public static function categoryList($request){
        return CmsGalaryCategoryList::categoryList($request);
    }
    public static function galaryCategoryAdd($request){
        return CmsGalaryCategoryAdd::categoryAdd($request);
    }
}