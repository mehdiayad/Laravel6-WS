<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $full_name
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $postal_code
 * @property string $cell_number
 * @property boolean $is_billing
 * @property boolean $is_shipping
 * @property boolean $is_default
 * @property string $extra_detail
 * @property string $active
 * @property string $created_at
 * @property string $updated_at
 */

    /** @OA\Schema(
    *     description="Pets Category",
    *     title="Pets Category",
    *     @OA\Xml(
    *         name="Address"
    *     )
    * )
    */
    
class Address extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'full_name', 'address', 'city', 'country', 'postal_code', 'cell_number', 'is_billing', 'is_shipping', 'is_default', 'extra_detail', 'active', 'created_at', 'updated_at'];

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     * )
     *
     * @var integer
     */
    private $id;
    
    
}
