<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    use HasFactory;

    public function empresa()
    {
        return $this->morphMany('\App\Models\Empresa', 'relacao');
    }
}
