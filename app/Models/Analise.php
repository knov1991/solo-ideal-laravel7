<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analise extends Model
{
    
    protected $fillable = [
        'talhao_id',
        'numero',
        'data',
        'ph',
        'nitrogenio',
        'fosforo',
        'potassio',
        'calcio',
        'magnesio',
        'enxofre',
        'boro',
        'cobre',
        'cloro',
        'ferro',
        'molibdenio',
        'zinco'
    ];

    /* Uma analise é de um Talhao */
    public function talhao()
    {
        return $this->belongsTo('App\Models\User', 'talhao_id');
    }
}