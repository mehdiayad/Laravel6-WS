<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $code
 * @property string $subcategory
 * @property float $price
 * @property string $brand
 * @property string $description_title
 * @property string $description_product
 * @property integer $stock
 * @property string $color
 * @property integer $score
 * @property string $img_overview
 * @property string $img1
 * @property string $img2
 * @property string $img3
 * @property string $active
 * @property Category $category
 */

/** @OA\Schema(
 *     title="Product",
 *     @OA\Xml(
 *         name="Product"
 *     )
 *   )
 */



class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'code', 'subcategory', 'price', 'brand', 'description_title', 'description_product', 'stock', 'color', 'score', 'img_overview', 'img1', 'img2', 'img3', 'active'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
