<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Restaurante
 *
 * @property $id
 * @property $nombre
 * @property $informacion
 * @property $direccion
 * @property $telefono
 * @property $web
 * @property $created_at
 * @property $updated_at
 *
 * @property Comentario[] $comentarios
 * @property Fotosrestaurante[] $fotosrestaurantes
 * @property Plato[] $platos
 * @property Valoracione[] $valoraciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Restaurante extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'informacion' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'web' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','informacion','direccion','telefono','web'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comentarios()
    {
        return $this->hasMany('App\Models\Comentario', 'restaurante_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fotosrestaurantes()
    {
        return $this->hasMany('App\Models\Fotosrestaurante', 'restaurante_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function platos()
    {
        return $this->hasMany('App\Models\Plato', 'restaurante_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valoraciones()
    {
        return $this->hasMany('App\Models\Valoracione', 'restaurante_id', 'id');
    }
    

}
