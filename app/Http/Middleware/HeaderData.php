<?php

namespace App\Http\Middleware;

use App\Model\Cart;
use App\Model\Category;
use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Auth;
use Closure;

class HeaderData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Update products categories
        $categoryRepository = new CategoryRepository(new Category);
        $categories = $categoryRepository->getCategories();
        session(['categories' => $categories]);
        
        // Update cart products number
        $cartRepository = new CartRepository(new Cart);
        $cart_articles = $cartRepository->getCartNumberSession(Auth::user()->id);
        session(['cart_articles' => $cart_articles]);
        
        return $next($request);
    }
}
