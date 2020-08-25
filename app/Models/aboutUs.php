<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class aboutUs
 * @package App\Models
 * @version August 21, 2020, 8:28 am UTC
 *
 * @property string $content
 * @property string $image
 */
class aboutUs extends Model
{
    use SoftDeletes;

    public $table = 'aboutuses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
        'content' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'content' => 'required',
        'image' => 'required'
    ];

    
}
