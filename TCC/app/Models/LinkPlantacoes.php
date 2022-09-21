<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkPlantacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plantacoes_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function plantacoes(){
        return $this->belongsTo('App\Models\Plantacoes');
    }
}
