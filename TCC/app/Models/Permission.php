<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
    
    use HasFactory;

    public function resource() {
        return $this->belongsTo('\App\Models\Resource');
    }

    public function role() {
        return $this->belongsTo('\App\Models\Role');
    }
}