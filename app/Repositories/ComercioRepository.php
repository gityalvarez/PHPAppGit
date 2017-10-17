<?php

namespace App\Repositories;

use App\Models\Comercio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ComercioRepository
 * @package App\Repositories
 * @version October 16, 2017, 9:05 pm UTC
 *
 * @method Comercio findWithoutFail($id, $columns = ['*'])
 * @method Comercio find($id, $columns = ['*'])
 * @method Comercio first($columns = ['*'])
*/
class ComercioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'latitud',
        'longitud',
        'direccion',
        'logo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comercio::class;
    }
}
