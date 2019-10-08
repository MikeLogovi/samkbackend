<?php

namespace App\Models;

use App\Models\Traits\SlugRoutable;
use App\Models\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   use SlugRoutable;
   protected $fillable=['title','description','source'];
  
}
