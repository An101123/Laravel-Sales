<?php

namespace App\Repositories;

use App\Models\orderDetail;
use App\Repositories\BaseRepository;

/**
 * Class orderDetailRepository
 * @package App\Repositories
 * @version August 21, 2020, 8:26 am UTC
*/

class orderDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_product',
        'id_order',
        'quantity',
        'price'
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
        return orderDetail::class;
    }
}
