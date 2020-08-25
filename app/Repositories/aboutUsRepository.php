<?php

namespace App\Repositories;

use App\Models\aboutUs;
use App\Repositories\BaseRepository;

/**
 * Class aboutUsRepository
 * @package App\Repositories
 * @version August 21, 2020, 8:28 am UTC
*/

class aboutUsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return aboutUs::class;
    }

    public function listAboutUs()
    {
        $aboutus = aboutUs::all();
        return $aboutus;
    }
}