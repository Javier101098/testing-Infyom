<?php

namespace App\Repositories;

use App\Models\autor;
use App\Repositories\BaseRepository;

/**
 * Class autorRepository
 * @package App\Repositories
 * @version February 23, 2021, 2:56 am UTC
*/

class autorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'correo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return autor::class;
    }
}
