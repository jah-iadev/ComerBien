<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plato
 *
 * @property $id
 * @property $nombre
 * @property $restaurante_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Fotosplato[] $fotosplatos
 * @property Restaurante $restaurante
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Plato extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'restaurante_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','restaurante_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotosplatos()
    {
        return $this->hasMany('App\Models\Fotosplato', 'plato_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function restaurante()
    {
        return $this->hasOne('App\Models\Restaurante', 'id', 'restaurante_id');
    }
    

}
