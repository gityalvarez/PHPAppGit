<?php

namespace App\Repositories;

use App\Models\Articulo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ArticuloRepository
 * @package App\Repositories
 * @version October 16, 2017, 9:15 pm UTC
 *
 * @method Articulo findWithoutFail($id, $columns = ['*'])
 * @method Articulo find($id, $columns = ['*'])
 * @method Articulo first($columns = ['*'])
*/
class ArticuloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'precio',
        'stock'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Articulo::class;
    }
}
