<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface CartRepositoryInterface
{
    public function getCartById($cart_id);
    
    public function getCartByUser($user_id);
    
    public function getCartByUserAndProduct($user_id,$product_id);
    
    public function addCart(Array $inputs);

    public function setCart(Array $inputs);
    
    public function cartExist(Array $inputs);
        
    public function getCartNumberSession($user_id);
    
    public function deleteCart($cart_id);  
    
    public function transformCartArticlesIntoCustomCollection(Collection $cart_articles);
    
    public function updateCart(Array $inputs, $cart_id);
    
}

