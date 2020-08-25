<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class customer
 * @package App\Models
 * @version August 21, 2020, 7:47 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $phoneNumber
 * @property string $address
 * @property string $note
 */
class customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phoneNumber',
        'address',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phoneNumber' => 'string',
        'address' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'phoneNumber' => 'required',
        'address' => 'required'
    ];

    
}
