<?php

namespace App\Models;

use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use SlugRoutable;
    public $fillable=['name','source','slug'];
}
