<?php

namespace App\Repositories;

use App\Models\customer;
use App\Repositories\BaseRepository;

/**
 * Class customerRepository
 * @package App\Repositories
 * @version August 21, 2020, 7:47 am UTC
*/

class customerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'phoneNumber',
        'address',
        'note'
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
        return customer::class;
    }
}
