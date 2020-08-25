<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class promotion
 * @package App\Models
 * @version August 21, 2020, 8:12 am UTC
 *
 * @property string $title
 * @property number $discount
 * @property string $content
 * @property string $image
 */
class promotion extends Model
{
    use SoftDeletes;

    public $table = 'promotions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'discount',
        'content',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'discount' => 'float',
        'content' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'discount' => 'required'
    ];

    
}
