<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $quantity
 * @property string $active
 * @property Product[] $products
 */



/** @OA\Schema(
 *     title="Category",
 *     @OA\Xml(
 *         name="Category"
 *     )
 *   )
 */



class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['code', 'name', 'quantity', 'active'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
