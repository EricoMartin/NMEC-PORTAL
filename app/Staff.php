<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $fillable = ['username', 'firstname', 'lastname',
    'file_number', 'avatar', 'email', 'dob', 'state', 'gender', 'phone', 
    'designation','grade_level', 'location', 'address',
     'qualification', 'discipline', 'department', 'committees'];
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
