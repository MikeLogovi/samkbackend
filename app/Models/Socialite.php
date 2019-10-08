<?php

namespace App\Models;

use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class Socialite extends Model
{   use SlugRoutable;
    public $fillable=['url','icon'];
    public function teams(){
        return $this->belongsTo(Team::class);
    }
}
