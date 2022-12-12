<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'negociante_id',
        'emissao',
        'valor_total'
    ];

    public function negociante(){
        return $this->belongsTo('App\Models\Negociantes')->withTrashed();
    }
}
