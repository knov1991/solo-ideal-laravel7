<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talhao extends Model
{
    
    protected $fillable = [
        'local_id',
        'nome'
    ];

    /* Um beneficiario é de uma organização(grupo) */
    public function local()
    {
        return $this->belongsTo('App\Models\User', 'local_id');
    }
    /* Um talhao possui muitas analises */
    public function analises()
    {
        return $this->hasMany('App\Models\Analise');
    }
}