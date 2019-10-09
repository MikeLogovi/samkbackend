<?php

namespace App\Models;

use App\Models\PortfolioImage;
use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{   use SlugRoutable;
	protected $fillable=['name','slug'];
    public function portfolio_images(){
    	return $this->hasMany(PortfolioImage::class);
    }
}
