<?php
namespace App\Sources\Cls\WebClass\Func;

use Illuminate\Support\Facades\DB;

class PageMode{
    public $page_total, $page_present, $page_round, $item_lines;
    public function __construct($page_round, $item_lines, $item_total, $id_category = null){//$item_total is name of category or number of item
        $this->page_round = $page_round;//
        $this->item_lines = $item_lines;//number of items show in one page
        //total of item
        if(!is_string($item_total)){
            $this->item_total = $item_total;
        }   else    {
            $item_total = DB::table('total_posts')
                          ->where('table_name', $item_total)
                          ->where('id_category', $id_category)
                          ->first();
            $this->item_total = $item_total->num_posts;
        }
        //total of page
        $this->page_total = ceil($this->item_total / $item_lines);
    }
    public function page_round($page_present = 1){
        $this->page_present = $page_present;
        if($this->page_total <= $this->page_round){
            return [1, $this->page_total];
        }   else    {
            $half_page_round = ceil($this->page_round / 2);
            if($this->page_present <= $half_page_round){
                return [1, $this->page_round];
            }   else    {
                $next = $this->page_round - $half_page_round;
                if($this->page_present + $next < $this->page_total){
                    return [$this->page_present - $half_page_round + 1, $this->page_present + $next];
                }   else    {
                    return [$this->page_total - $this->page_round + 1, $this->page_total];
                }
            }
        }
    }
}