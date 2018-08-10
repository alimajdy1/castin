<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    protected $fillable = ['parent_id', 'key', 'name'];
    protected $attributes = ['id' => 0, 'name' => ''];


    public static function getConstants($key){
        return self::where('key', $key)->whereNull('parent_id')->with('childrens')->first();
    }

    public function childrens(){
        return $this->hasMany(Constant::class, 'parent_id', 'id');
    }
}
