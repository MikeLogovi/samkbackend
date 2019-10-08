<?php
namespace App\Services;
Class File{
    public function getFileExtension($path){
        return pathinfo($path,PATHINFO_EXTENSION);
    }
    public function isImage($path){
        $extensions=['png','jpeg','jpg','gif','bmp'];
        $extension=strtolower($this->getFileExtension($path));
        return in_array($extension,$extensions);
    }
    public function isVideo($path){
        $extensions=['mp4','avi','quicktime'];
        $extension=strtolower($this->getFileExtension($path));
        return in_array($extension,$extensions);
    }
}