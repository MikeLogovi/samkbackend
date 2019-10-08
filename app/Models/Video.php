<?php

namespace App\Models;

use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{  use SlugRoutable;
    public $fillable=['title','description','source'];
}
