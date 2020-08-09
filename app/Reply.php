<?php

namespace App;

use App\User;
use App\Staff;
use App\Message;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function message()
    {
        return $this->belongsTo('App\Message');
    }
}
