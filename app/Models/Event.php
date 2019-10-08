<?php

namespace App\Models;

use App\Models\Traits\SlugRoutable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{   use SlugRoutable;
    public $append =['status'];
    public $fillable =['name','description','event_date','source','price'];
    public function status(){
        //Put status algorithm here!
        return 'Status';
    }

}
