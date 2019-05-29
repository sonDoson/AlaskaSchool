<?php
namespace App\Sources\Cls\WebClass\Func\Tool;

use Illuminate\Support\Facades\DB;

class StrToLow{
    private $db_name;
    
    public static function DB($db_name){
        $self = new self;
        $self->db_name = $db_name;
        return $self;
    }
    public function column($column){
        $this->column = $column;
    }
    public function go(){
        $this->getColumn();
        $this->update();
    //    $this->change();
    }
    
    private $li;
    private function getColumn(){
        $this->li = DB::table($this->db_name)->select('id', 'image_name', 'image_path')->get();
    }
    
    private function update(){
        //foeach list
        foreach($this->li as $value){
            //im_name
            $new_path = $this->repath($value->image_name);
            $this->store('image_name', $value->id, $new_path);
            //im_path
            $new_path = $this->repath($value->image_path);
            $this->store('image_path', $value->id, $new_path);
        }

    }
        private function repath($old_path){
            $extension = substr($old_path, strrpos($old_path,'.'));
            $re_extension = strtolower($extension);
            $new_path = str_replace($extension, $re_extension, $old_path);
            return $new_path;
        }
        private function store($column, $id, $new_path){
            DB::table($this->db_name)->where('id', $id)->update([$column => $new_path]);
        }
}