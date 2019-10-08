<?php

namespace App\Models;

use App\Models\Socialite;
use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{ use SlugRoutable;
    public $fillabe=['name','country','description','source'];
    public function socialites(){
        return $this->hasMany(Socialite::class);
    }
}
