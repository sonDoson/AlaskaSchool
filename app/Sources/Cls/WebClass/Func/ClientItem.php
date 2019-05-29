<?php
namespace App\Sources\Cls\WebClass\Func;

use App\Sources\Cls\WebClass\Func\MethodClient\ClientItemList;
use App\Sources\Cls\WebClass\Func\MethodClient\ClientItemCategoryList;
use App\Sources\Cls\WebClass\Func\MethodClient\ClientItemPostsList;
use App\Sources\Cls\WebClass\Func\MethodClient\ClientGetItem;

class ClientItem{
    public static function getListItem($table, $id_category = null){
        return ClientItemList::getListItem($table, $id_category);
    }
    public static function getCategoryItemList($table, $index = 0){
        return ClientItemCategoryList::getCategoryItemList($table, $index);
    }
    public static function getPostsItemList($table, $id, $index = 0){
        return ClientItemPostsList::getPostsItemList($table, $id, $index);
    }
    public static function getItem($table, $id_posts){
        return ClientGetItem::getItem($table, $id_posts);
    }
}