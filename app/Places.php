<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Places extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table    = 'places';
    
    protected $fillable = [
        'name',
        'region_id'
    ];
    
    public function Regions()
    {
        return $this->hasOne('App\Regions', 'id', 'region_id');
    }
    
    public function Districts()
    {
        return $this->hasMany('App\Districts', 'place_id', 'id');
    }
    
}
