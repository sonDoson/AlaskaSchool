<?php
namespace App\Sources\Cls\WebClass\Func;

use App\Sources\Cls\WebClass\Func\Method\CmsGetItem;
use App\Sources\Cls\WebClass\Func\Method\CmsItemAdd;
use App\Sources\Cls\WebClass\Func\Method\CmsItemTextEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsItemList;
use App\Sources\Cls\WebClass\Func\Method\CmsItemEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsItemDelete;

class CmsItem{
    public static function getItem($id_posts, $table, $stress = null, $subtitle = null){
        return CmsGetItem::getItem($id_posts, $table, $stress, $subtitle);
    }
    public static function itemEdit($request, $table, $id_posts){
        return CmsItemTextEdit::itemEdit($request, $table, $id_posts);
    }
    public static function addItem($table, $request){//basic name - subtitle - image - value - stress
        return CmsItemAdd::addItem($table, $request);
    }
    public static function itemListByCategory($table, $id_category = null, $request = null){
        return CmsItemList::postsListItem($table, $id_category, $request = null);
    }
    public static function itemList($table, $request = null){
        return CmsItemList::itemList($table, $request);
    }
    public static function editItem($table, $request){
        return CmsItemEdit::itemEdit($table, $request);
    }
    public static function deleteItem($table, $id){
        return CmsItemDelete::itemDelete($table, $id);
    }
}