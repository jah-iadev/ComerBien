<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosPlato extends Model
{
    use HasFactory;

    protected $table = 'fotosplatos';

    public static $rules = [
        //'nombre' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //'restaurante_id' => 'required|exists:restaurantes,id',
    ];

    protected $fillable = [
        "foto", 
        "plato_id"
     ];

     public function plato () {
        return $this->belongsTo(Plato::class, 'id');
    }
}
