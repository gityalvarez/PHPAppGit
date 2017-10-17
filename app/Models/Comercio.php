<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comercio
 * @package App\Models
 * @version October 16, 2017, 9:05 pm UTC
 *
 * @property string nombre
 * @property string latitud
 * @property string longitud
 * @property string direccion
 * @property blob logo
 */
class Comercio extends Model
{
    use SoftDeletes;

    public $table = 'comercios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'latitud',
        'longitud',
        'direccion',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'latitud' => 'string',
        'longitud' => 'string',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'direccion' => 'required'
    ];

    public function articulo(){
        return $this->belongsToMany('Articulo');
    }
    
    public function persona(){
        return $this->belongsTo('Persona');
    }
}
