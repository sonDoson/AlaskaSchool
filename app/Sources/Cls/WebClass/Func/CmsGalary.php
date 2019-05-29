<?php
namespace App\Sources\Cls\WebClass\Func;

use App\Sources\Cls\WebClass\Func\Method\CmsGalaryCategoryList;
use App\Sources\Cls\WebClass\Func\Method\CmsGalaryCategoryAdd;
use App\Sources\Cls\WebClass\Func\Method\CmsGalaryCategoryGet;
use App\Sources\Cls\WebClass\Func\Method\CmsGalaryCategoryEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsCategoryDelete;

class CmsGalary{
    public static function categoryList($request){
        return CmsGalaryCategoryList::categoryList($request);
    }
    public static function galaryCategoryAdd($request){
        return CmsGalaryCategoryAdd::categoryAdd($request);
    }
    public static function galaryCategoryGet($id){
        return CmsGalaryCategoryGet::categoryGet($id);
    }
    public static function categoryGet($id){
        return CmsGalaryCategoryGet::categoryGet($id);
    }
    public static function galaryCategoryEdit($request, $table){
        return CmsGalaryCategoryEdit::galaryCategoryEdit($request, $table);
    }
    public static function galaryCategoryDelete($table, $id){
        return CmsCategoryDelete::categoryDelete($table, $id);
    }
}