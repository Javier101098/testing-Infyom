<?php

namespace App\Repositories;

use App\Models\topic;
use App\Repositories\BaseRepository;

/**
 * Class topicRepository
 * @package App\Repositories
 * @version February 23, 2021, 3:00 am UTC
*/

class topicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return topic::class;
    }
}
