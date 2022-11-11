<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plantacoes extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'lua',
        'plantio',
        'mudas',
        'user_id',
        'planta_id'
    ];

    public function planta(){
        return $this->belongsTo('App\Models\Plantas');
    }
}
