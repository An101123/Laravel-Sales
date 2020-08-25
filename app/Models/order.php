<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class order
 * @package App\Models
 * @version August 21, 2020, 8:20 am UTC
 *
 * @property integer $id_customer
 * @property string $dateOrder
 * @property number $amount
 * @property integer $id_promotion
 */
class order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_customer',
        'dateOrder',
        'amount',
        'id_promotion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_customer' => 'integer',
        'dateOrder' => 'date',
        'amount' => 'float',
        'id_promotion' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_customer' => 'required',
        'dateOrder' => 'required',
        'amount' => 'required'
    ];

    
}
