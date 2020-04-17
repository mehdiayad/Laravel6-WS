<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $product_quantity
 * @property float $price
 * @property string $validated
 * @property string $active
 * @property string $created_at
 * @property string $updated_at
 */


/** @OA\Schema(
 *     title="Cart",
 *     @OA\Xml(
 *         name="Cart"
 *     )
 *   )
 */

class Cart extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'product_id', 'product_quantity', 'price', 'validated', 'active', 'created_at', 'updated_at'];

}
