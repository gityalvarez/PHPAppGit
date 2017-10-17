<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Articulo
 * @package App\Models
 * @version October 16, 2017, 9:15 pm UTC
 *
 * @property decimal(8 precio
 * @property integer stock
 */
class Articulo extends Model
{
    use SoftDeletes;

    public $table = 'articulos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'precio',
        'stock'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'precio' => 'required'
    ];

    public function comercio(){
        return $this->belongsTo('Comercio');
    }
    
    public function producto(){
        return $this->belongsTo('Producto');
    }
    
}
