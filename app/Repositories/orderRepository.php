<?php

namespace App\Repositories;

use App\Models\order;
use App\Repositories\BaseRepository;

/**
 * Class orderRepository
 * @package App\Repositories
 * @version August 21, 2020, 8:20 am UTC
*/

class orderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_customer',
        'dateOrder',
        'amount',
        'id_promotion'
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
        return order::class;
    }
}
