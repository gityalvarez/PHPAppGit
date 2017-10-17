<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Producto
 * @package App\Models
 * @version October 16, 2017, 9:11 pm UTC
 *
 * @property string nombre
 * @property blob imagen
 * @property integer codigo
 */
class Producto extends Model
{
    use SoftDeletes;

    public $table = 'productos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'imagen',
        'codigo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'codigo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'codigo' => 'required'
    ];

    public function articulo(){
        return $this->belongsToMany('Articulo');
    }
    
    public function categoria(){
        return $this->belongsTo('Categoria');
    }
}
