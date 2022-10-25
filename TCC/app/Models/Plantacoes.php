<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'lua',
        'plantio',
        'mudas',
        'user_id',
        'planta_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function planta(){
        return $this->belongsTo('App\Models\Plantas');
    }
}
