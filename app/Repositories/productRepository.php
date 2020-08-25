<?php

namespace App\Repositories;

use App\Models\product;
use App\Repositories\BaseRepository;

/**
 * Class productRepository
 * @package App\Repositories
 * @version August 20, 2020, 2:14 pm UTC
*/

class productRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'price',
        'price_promotion',
        'image',
        'id_category'
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
        return product::class;
    }
}
