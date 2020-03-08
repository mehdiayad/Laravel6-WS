<?php
namespace App\Repositories;

use App\Model\Category;
use Illuminate\Support\Facades\DB;


class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;
    
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    
    public function getCategories()
    {
        $categories = DB::table('categories')->where('active', '1')->get();
                        
        return $categories;
    }
   
}

