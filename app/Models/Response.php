<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public $fillable=['message_id','content'];
    public function message(){
    	return $this->belongsTo(Message::class);
    } 
}
