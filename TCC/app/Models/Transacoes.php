<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacoes extends Model
{
    use HasFactory;

    public function insumo(){
        return $this->belongsTo('App\Models\Insumos')->withTrashed();
    }

    public function produto(){
        return $this->belongsTo('App\Models\Produtos')->withTrashed();
    }

    public function plantacao(){
        return $this->belongsTo('App\Models\Plantacoes')->withTrashed();
    }

    public function nota(){
        return $this->belongsTo('App\Models\Notas');
    }
}
