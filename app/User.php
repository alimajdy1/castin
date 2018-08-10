<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'email','utype', 'password', 'image', 'location', 'gender', 'height', 'weight', 'chest', 'hair_color', 'hair_style', 'eyes_color', 'hips', 'size', 'waist', 'skin_color', 'hair_cut', 'tattoo'
    ];
    protected $appends = ['real_image'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function jobs(){
        return $this->hasMany('App\Job','user_id');
    }
    public function getRealImageAttribute()
    {
        return $this->attributes['image'];
    }
    public function images(){
        return $this->hasMany('App\UserImage','user_id');
    }
}
