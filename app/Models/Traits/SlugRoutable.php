<?php 
namespace App\Models\Traits;
trait SlugRoutable{
    public function getRouteKeyName(){
        return 'slug';
    }
    public function getUpdatedAtAttribute(){
        return formatMyDate($this->attributes['updated_at']);
    }
}