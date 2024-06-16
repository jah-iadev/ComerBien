<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        "comentario", 
     ];

     public function restaurante () {
        return $this->belongsTo(Restaurante::class, 'id');
    }

    public function usuario () {
        return $this->belongsTo(User::class, 'id');
    }
}
