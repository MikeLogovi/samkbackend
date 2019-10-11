<?php

namespace App\Models;

use App\Models\Socialite;
use App\Models\Traits\SlugRoutable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{ use SlugRoutable;
    public $fillable=['name','country','description','source','team_creator_id'];
    public function socialites(){
        return $this->hasMany(Socialite::class);
    }
    public function user(){
        return $this->belongsTo(App\Models\User::class);
    }
}
