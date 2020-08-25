<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class orderDetail
 * @package App\Models
 * @version August 21, 2020, 8:26 am UTC
 *
 * @property integer $id_product
 * @property integer $id_order
 * @property integer $quantity
 * @property number $price
 */
class orderDetail extends Model
{
    use SoftDeletes;

    public $table = 'order_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_product',
        'id_order',
        'quantity',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_product' => 'integer',
        'id_order' => 'integer',
        'quantity' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_product' => 'required',
        'id_order' => 'required',
        'quantity' => 'required',
        'price' => 'required'
    ];

    
}
