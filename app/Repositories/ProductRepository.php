<?php
namespace App\Repositories;

use App\Model\Cart;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Auth;


class ProductRepository implements ProductRepositoryInterface
{
    protected $product;
    protected $category;
    
    
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    
    
    public function getPaginate($n)
    {
        
        // display with ORM (pagination)
        return $this->product::where('active', '=', '1')->paginate($n);
        
        // display with Query builder (pagination)
        // return DB::table('products')->paginate($n);
        
        // display with Query RAW (pagination) cannot work with render()
        // return DB::select("select * from users where active = 1 limit ? offset 0", [$n]);
        
    }
    
    public function getPaginateCategory($n,$categoryId)
    {
        return $this->category::find($categoryId)->products()->where('products.active','=','1')->paginate($n);
    }
    
    public function getPaginateProduct($n,$productName)
    {
        return $this->product::where('products.description_title','LIKE','%'.$productName.'%')->where('active', '=', '1')->paginate($n);
        
    }
    
    public function getPaginateCategoryProduct($n,$categoryId,$productName)
    {
        return $this->category::find($categoryId)->products()->where('products.description_title','LIKE','%'.$productName.'%')->where('products.active','=','1')->paginate($n);
    }
    
    public function getById($id)
    {
        return $this->product->findOrFail($id);
    }
    
}
