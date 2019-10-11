<?php

namespace App\Models;

use App\Models\Traits\SlugRoutable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use SlugRoutable;
    public $fillable=['name','source','slug'];
    public function user(){
        return $this->belongsTo(App\Models\User::class);
    }
}
