<?php

namespace App\Repositories;

use App\Models\books;
use App\Repositories\BaseRepository;

/**
 * Class booksRepository
 * @package App\Repositories
 * @version February 23, 2021, 2:30 am UTC
*/

class booksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'publication'
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
        return books::class;
    }
}
