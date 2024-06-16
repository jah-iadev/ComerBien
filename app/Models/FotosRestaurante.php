<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosRestaurante extends Model
{
    use HasFactory;

    protected $table = 'fotosrestaurantes';

    public static $rules = [
        //'nombre' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //'restaurante_id' => 'required|exists:restaurantes,id',
    ];

    protected $fillable = [
        "foto", 
        "restaurante_id"
     ];

     public function restaurante () {
        return $this->belongsTo(Restaurante::class, 'id');
    }
}
