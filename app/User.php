<?php

namespace App;

use App\Staff;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'file_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function staff(){
        return $this->hasOne('App\Staff');
    }
    
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role){
        $roles = $this->roles()->where('name', $role)->count();
        if($roles == 1 || $roles > 1){
            return true;
        }
        return false;
    }
}
