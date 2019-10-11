<?php

namespace App\Models;

use App\Models\PortfolioCategory;
use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{   use SlugRoutable;
	protected $fillable=['portfolio_category_id','title','source'];
    public function portfolio_category(){
    	return $this->belongsTo(PortfolioCategory::class);
    }
    public function dataSize(){
        $data_size=["480x360","480x757","480x720","480x270"];
        return $data_size[rand(0,3)];
    }
}
