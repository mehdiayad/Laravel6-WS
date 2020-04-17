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
 *     title="Address",
 *     @OA\Xml(
 *         name="Address"
 *     )
 *   )
 */

    
class Address extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'full_name', 'address', 'city', 'country', 'postal_code', 'cell_number', 'is_billing', 'is_shipping', 'is_default', 'extra_detail', 'active', 'created_at', 'updated_at'];

    /**
     * @OA\Property(format="int64")
     *
     * @var integer
     */
    private $id;
    
    /**
     * @OA\Property()
     *
     * @var integer
     */
    private $user_id;
    
    /**
     * @OA\Property()
     *
     * @var string
     */
    private $fullname;
    
    /**
     * @OA\Property()
     *
     * @var string
     */
    private $address;
    
    /**
     * @OA\Property()
     *
     * @var string
     */
    private $city;
    
    /**
     * @OA\Property()
     *
     * @var string
     */
    private $country;
    
    /**
     * @OA\Property()
     *
     * @var string
     */
    private $postal_code;
    
    /**
     * @OA\Property()
     *
     * @var string
     */
    private $cell_number;
    
    /**
     * @OA\Property()
     *
     * @var boolean
     */
    private $is_billing;
    
    /**
     * @OA\Property()
     *
     * @var boolean
     */
    private $is_shipping;
    
    /**
     * @OA\Property()
     *
     * @var boolean
     */
    private $is_default;
    
    /**
     * @OA\Property()
     * @var string
     */
    private $extra_detail;
    
    /**
     * @OA\Property(format="char")
     *
     * @var string
     */
    private $active;
    
    /**
     * @OA\Property()
     *
     * @var \DateTime
     */
    private $created_at;
    
    /**
     * @OA\Property()
     *
     * @var \DateTime
     */
    private $updated_at;
    
    
}
