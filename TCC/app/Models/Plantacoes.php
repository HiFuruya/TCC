<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function user(){
        return $this->belongsToMany('App\Models\User', 'users');
    }
}