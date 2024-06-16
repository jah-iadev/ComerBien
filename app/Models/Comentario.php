<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    static $rules = [
		'comentario' => 'required',
		'usuario_id' => 'required',
		'restaurante_id' => 'required',
    ];

    protected $fillable = [
        "comentario", 
        "usuario_id",
        "restaurante_id"
     ];

     public function restaurante () {
        return $this->belongsTo(Restaurante::class, 'id');
    }

    public function usuario () {
        return $this->belongsTo(User::class, 'id');
    }
}
