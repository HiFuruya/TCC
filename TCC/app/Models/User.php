<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function plantacoes(){
        return $this->hasMany('App\Models\Plantacoes', 'plantacoes');
    }

    public function negociantes(){
        return $this->hasMany('App\Models\Negociantes', 'negociantes');
    }

    public function produtos_vendas(){
        return $this->hasMany('App\Models\ProdutosVenda', 'produtos_vendas');
    }

        public function insumos(){
        return $this->hasMany('App\Models\Insumos', 'insumos');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
