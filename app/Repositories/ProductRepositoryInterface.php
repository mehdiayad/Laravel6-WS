<?php
namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function getPaginate($n);
    
    public function getPaginateCategory($n,$categoryId);
    
    public function getPaginateProduct($n,$productName);
    
    public function getPaginateCategoryProduct($n,$categoryId,$productName);

    public function getById($id);
        
}

