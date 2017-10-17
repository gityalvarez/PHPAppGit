<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Persona
 * @package App\Models
 * @version October 16, 2017, 9:33 pm UTC
 *
 * @property string nombre
 * @property string apellido
 * @property string email
 * @property string latitud
 * @property string longitud
 * @property string direccion
 */
class Persona extends Model
{
    use SoftDeletes;

    public $table = 'personas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellido',
        'email',
        'latitud',
        'longitud',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'apellido' => 'string',
        'email' => 'string',
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
        'apellido' => 'required',
        'email' => 'required',
        'direccion' => 'required'
    ];

    public function pedido(){
        return $this->belongsToMany('Pedido');
    }
    
    public function comercio(){
        return $this->belongsTo('Comercio');
    }
}
