<?php

namespace App\Models;

use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SlugRoutable;
    public $fillable =['author_name','author_function','comment','source','slug'];
    public function user(){
        return $this->belongsTo(App\Models\User::class);
    }
}
