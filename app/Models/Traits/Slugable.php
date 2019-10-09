<?php 
namespace App\Models\Traits;
trait Slugable{
    public static function bootSlugable(){
        parent::boot();
        static::creating(function($slider){
            $slider->slug=str_slug($slider->title);
        });
    }
   
}