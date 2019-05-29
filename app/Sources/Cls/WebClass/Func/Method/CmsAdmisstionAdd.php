<?php
namespace App\Sources\Cls\WebClass\Func\Method;

use Illuminate\Support\Facades\DB;
use App\Sources\Cls\WebClass\Func\Method\CmsImagesEdit;
use App\Sources\Cls\WebClass\Func\Method\CmsFilesEdit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Sources\Cls\WebClass\Func\Tool\Resize;

class CmsAdmisstionAdd{
    private $request;
    private $error = array();
    private $id;
    public static function request($request){
        $self = new self;
        $self->request = $request;
        $self->save();
    }
    private function save(){
        //validator
        $this->validator();
        //category, name, value,
        $this->insertGetId();
        //file
        $this->file();
        //cover
        $this->cover();
        //subtite
        $this->subtitle();
        //return
        if(empty($this->error)){
            return 0;
        }   else    {
            return $this->error;
        }
    }
    /**/
    private function validator(){
        $validator = Validator::make($this->request, [
            'name.vn' => 'required',
            'images.*' => 'mimes:jpeg,bmp,png,gif,JPEG,BMP,PNG,GIF'
        ]);

        if ($validator->fails()) {
            return $validator->fails();
        }
    }
    
    private function insertGetId(){
        $this->id = DB::table('registration_posts')->insertGetId([
            'id_category' => $this->request['id_category'],
            'name_vn' => $this->request['name']['vn'],
            'name_en' => $this->request['name']['en'],
            'value_vn' => $this->request['value']['vn'],
            'value_en' => $this->request['value']['en'],
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
    }
    
    private function file(){
        
    }
    private function cover(){
        //check file
        $flag = $this->checkImages();
        if($flag === 1){
            $this->addCover();
        }
    }
        private function checkImages(){
            if(!$this->request['images']){return 1;}else{return 0;}
        }
        private function addCover(){
            $images = $this->request['images'];
            
            foreach($images as $key => $value){
                //name
                
                //paths
                
                //store
                
                //store thumbnail
                
            }
        }
            private function imageName($key, $image){
                $extension = strtolower($image->getClientOriginalExtension());
                return $name = $this->id . '_' . $key . '.' . $extension;
            }
            private function imagePath(){
                $path = '/uploads/images/registration_posts';
                $destinationPath = public_path($path);
                $image_path = $path . '/' . $name;
                $destinationPathImage = public_path($image_path);
                return array(
                    'path' => $path,
                    'destinationPath' => $destinationPath,
                    'image_path' => $image_path,
                    'destinationPathImage' => $destinationPathImage
                );
            }
            private function imageStore(){
                //DB::table('registration_images')->insert(
                //    ['id_posts' => $id_posts, 'image_name' => $name, 'image_path' => $image_path]
                //);
            }
            private function imageStoreThumbnail(){
                Resize::path($tb_select_path)->width(500)->do();
            }
    private function subtitle(){
        DB::table('registration_subtitle')->insert([
            'id_posts' => $this->id,
            'value_vn' => $this->request['subtitle']['vn'],
            'value_en' => $this->request['subtitle']['en']
        ]);
    }
}