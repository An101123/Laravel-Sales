<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class product
 * @package App\Models
 * @version August 20, 2020, 2:14 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property number $price
 * @property number $price_promotion
 * @property string $image
 * @property integer $id_category
 */
class product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'price',
        'price_promotion',
        'image',
        'id_category'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'price_promotion' => 'float',
        'image' => 'string',
        'id_category' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'image' => 'required',
        'id_category' => 'required'
    ];

    
}