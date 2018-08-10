<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','user_id', 'description','location', 'need_date', 'remuneration', 'gender', 'height', 'weight', 'chest', 'hair_color', 'hair_style', 'eyes_color', 'hips', 'size', 'waist', 'skin_color', 'hair_cut', 'tattoo'
    ];

    /**
     * @param $value
     * @return mixed
     */
    public function getHeightAttribute($value){
        return explode(',',$value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getWeightAttribute($value){
        return explode(',',$value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getChestAttribute($value){
        return explode(',',$value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getHipsAttribute($value){
        return explode(',',$value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getSizeAttribute($value){
        return explode(',',$value);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function getWaistAttribute($value){
        return explode(',',$value);
    }
    /**
     * @param $value
     * @return mixed
     */
    public function getNeedDateAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
}
