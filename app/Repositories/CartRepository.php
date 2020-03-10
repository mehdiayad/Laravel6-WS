<?php

namespace App\Repositories;

use App\Model\Cart;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//use Debugbar;

class CartRepository implements CartRepositoryInterface
{
    protected $cart;
    
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    
    public function getCartById($cart_id)
    {
        return $this->cart::where('id', '=',$cart_id)->where('validated', '=','0')->where('active', '=','1')->get();
    }
    
    public function getCartByUser($user_id)
    {
        return $this->cart::where('user_id', '=',$user_id)->where('validated', '=','0')->where('active', '=','1')->get();
    }

    public function getCartByUserAndProduct($user_id,$product_id)
    {
        return $this->cart::where('user_id', '=',$user_id)->where('product_id', '=',$product_id)->where('validated', '=','0')->where('active', '=','1')->get();
    }
    
    
    public function addCart(Array $inputs)
    {
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $inputs['product_id'];
        $cart->product_quantity = $inputs['product_quantity'];
        $cart->price = $inputs['product_quantity']* ((double)$inputs['product_price']);
        $cart->created_at = now();
        $cart->updated_at = now();
        $cart->save();
    }
    
    public function cartExist(Array $inputs)
    {
        $user_id = Auth::user()->id;
        $product_id = (int) $inputs['product_id'];
        
        $res =  $this->getCartByUserAndProduct($user_id, $product_id);
    
        if(count($res)>0)
            return true;
        else 
            return false;
    }
    
    public function setCart(array $inputs)
    {
        // variables
        $user_id = Auth::user()->id;
        $product_id = $inputs['product_id'];
        $product_quantity = (int) $inputs['product_quantity'];
        $product_price = (double)$inputs['product_price'];
        
        // get cart
        $carts = $this->getCartByUserAndProduct($user_id, $product_id);
        $cart = $carts->first();
        
        // update cart
        $cart->product_quantity +=  $product_quantity;
        $cart->price =  $cart->product_quantity*$product_price;
        $cart->updated_at = now();
        $cart->save();
    }
    
        
    public function getCartNumberSession($user_id)
    {
        // get total articles
        $articles = $this->getCartByUser($user_id);
        $cart_articles = 0;
        
        foreach ($articles as $article)
        {
            $cart_articles += $article->product_quantity;
        }  
        
        return $cart_articles;
    }
    
    public function deleteCart($cart_id)
    {
        $carts = $this->getCartById($cart_id);
                        
        $cart = $carts->first();
        
        $cart->active = '0';
        
        $cart->save();
    }

    public function transformCartArticlesIntoCustomCollection($user_id, Collection $cart_articles)
    {
        $cart_articles_custom = new Collection();
        
        if(count($cart_articles)>0)
        {
            
            foreach ($cart_articles as $cart_article)
            {
                $product_id = $cart_article->product_id;
                
                $response = DB::table('carts')
                ->join('users', 'carts.user_id', '=', "users.id")
                ->join('products', 'carts.product_id', '=', "products.id")
                ->select('carts.*', 'carts.id as cart_id','carts.price as cart_price', 'users.id as user_id', 'users.name', 'products.*', 'products.id as product_id')
                ->where('carts.active', '=', '1')
                ->where('carts.user_id', '=', $user_id)
                ->where('carts.product_id', '=', $product_id)
                ->get();
                
                //Debugbar::info("AVANT");
                //Debugbar::info($response);
                
                $cart_article_custom = null;
                
                if($response->count()>0)
                {
                    $cart_article_custom = $response->first();
                }
                
                //Debugbar::info("APRES");
                //Debugbar::info($cart_article_custom);
                
                // Cast into Object
                $cart_articles_custom->push($cart_article_custom);
            }
        }
        
        return $cart_articles_custom;
    
    }
    
    public function updateCart(array $inputs, $cart_id)
    {
        
        // variables
        $product_quantity = (int) $inputs['product_quantity'];
        $product_price = (double)$inputs['product_price'];
        
        // get cart
        $carts = $this->getCartById((int)$cart_id);
        $cart = $carts->first();
        
        // update cart
        $cart->product_quantity =  $product_quantity;
        $cart->price =  $cart->product_quantity*$product_price;
        $cart->updated_at = now();
        $cart->save();
        
        //$this->getCartNumberSession($user_id);
    }

    
    
  
}