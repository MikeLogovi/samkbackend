<?php

namespace App\Models;

use App\Models\PortfolioCategory;
use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{   use SlugRoutable;
	protected $guarded=[];
    public function category(){
    	return $this->belongTo(PortfolioCategory::class);
    }
}
