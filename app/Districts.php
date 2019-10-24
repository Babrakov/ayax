<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Districts extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table    = 'districts';
    
    protected $fillable = [
        'name',
        'place_id'
    ];
    
    public function Places()
    {
        return $this->hasOne('App\Places', 'id', 'place_id');
    }
}
