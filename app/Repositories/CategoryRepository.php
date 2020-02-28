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
        // WORK
        $categories = DB::table('categories')->where('active', '1')->get();
                        
        $categories2 = array();
        
        foreach ($categories as $category) {
            $categories2[$category->id] = $category->name;
        }
        
        return $categories2;
    }
   
}

