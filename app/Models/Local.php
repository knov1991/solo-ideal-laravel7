<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    
    protected $fillable = [
        'user_id',
        'nome'
    ];

    /* Um Local é de um Usuario */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    /* Um local possui muitos talhaos */
    public function talhaos()
    {
        return $this->hasMany('App\Models\Talhao');
    }
}