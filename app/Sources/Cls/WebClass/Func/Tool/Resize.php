<?php
namespace App\Sources\Cls\WebClass\Func\Tool;
    
class Resize
{
    //Resize::path($path)->newPath($path_new)->width($width)->height($height)->do()
    //construct
    private $path, $path_new, $width, $height;
    private $error = array();
    public static function path($path){
        $self = new self;
        $self->path = $path;
        return $self;
    }
    public function newPath($path_new){
        $this->path_new = $path_new;
        return $this;
    }
    public function width($width){
        $this->width = $width;
        return $this;
    }
    public function height($height){
        $this->height = $height;
        return $this;
    }
    public function do(){
        $this->getImage();
        $this->widthHeight();
        $this->resize();
        $this->makeNewPath();
        $this->saveImageOut();
        return $this->extension;
    }
    
    //create
    private $image, $extension, $width_old, $height_old, $image_out;
    
    private function getImage(){
        //create image
        $this->createOldImage();
        $this->returnOldWidthHeight();
        
    }
        private function createOldImage(){
            //extension
            $extension = substr($this->path,strrpos($this->path,'.'));
            $this->extension = $extension;
            if(!in_array($extension, array('.jpg','.jpeg','.png','.gif','.bmp'))){ 
                $this->error[] = "Khong dung dinh dang";
            }
            //build image
            switch ($extension){
                case '.jpg':
                    $this->image = imagecreatefromjpeg($this->path);
                    break;
                case '.jpeg':
                    $this->image = imagecreatefromjpeg($this->path);
                    break;
                case '.png':
                    $this->image = imagecreatefrompng($this->path);
                    break;
                case '.gif':
                    $this->image = imagecreatefromgif($this->path);
                    break;
                case '.bmp':
                    $this->image = imagecreatefromwbmp($this->path);
                    break;
            }
        }
        private function returnOldWidthHeight(){
            $this->width_old = imagesx($this->image);
            $this->height_old = imagesy($this->image);
        }
    //
    private function widthHeight(){
        if($this->width == null){
            $this->followHeight();
        }   elseif($this->height == null)   {
            $this->followWidth();
        }
    }
        private function followWidth(){
            $this->height = ($this->width * $this->height_old)/$this->width_old;
        }
        private function followHeight(){
            $this->width = ($this->height * $this->width_old)/$this->height_old;
        }
    
    private function resize(){
        $image_out = imagecreatetruecolor($this->width, $this->height);
        imagecopyresampled($image_out, $this->image, 0, 0, 0, 0, $this->width, $this->height, $this->width_old, $this->height_old);
        $this->image_out = $image_out;
    }
    private function makeNewPath(){
        $this->path_new = str_replace($this->extension, '_resize' . $this->extension, $this->path);
    }
    private function saveImageOut(){
        switch ($this->extension){
            case '.jpg':
                imagejpeg($this->image_out, $this->path_new);
                break;
            case '.jpeg':
                imagejpeg($this->image_out, $this->path_new);
                break;
            case '.png':
                imagepng($this->image_out, $this->path_new);
                break;
            case '.gif':
                imagegif($this->image_out, $this->path_new);
                break;
            case '.bmp':
                imagewbmp($this->image_out, $this->path_new);
                break;
        }
    }
}