<?php

namespace App\Models;

use App\Models\Response;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   public $fillable=['author_name','author_email','content'];
   public function messages(){
   	return $this->hasMany(Response::class);
   }
}
