<?php

namespace App\Repositories;

use App\Models\promotion;
use App\Repositories\BaseRepository;

/**
 * Class promotionRepository
 * @package App\Repositories
 * @version August 21, 2020, 8:12 am UTC
*/

class promotionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'discount',
        'content',
        'image'
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
        return promotion::class;
    }
}
