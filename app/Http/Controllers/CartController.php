<?php

namespace App\Http\Controllers;

use App\Model\Address;
use App\Repositories\AddressRepository;
use App\Repositories\CartRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Debugbar;

class CartController extends Controller
{
    protected $cartRepositoryInterface;
    
    
    public function __construct(CartRepositoryInterface $cartRepositoryInterface)
    {
        $this->cartRepositoryInterface = $cartRepositoryInterface;
        //$this->middleware('auth');
        //$this->middleware('header_data');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all cart referenced to this user
        $cart_articles = $this->cartRepositoryInterface->getCartByUser(Auth::user()->id);        
        $cart_articles_custom = $this->cartRepositoryInterface->transformCartArticlesIntoCustomCollection($cart_articles);
                
        //Debugbar::info($cart_articles);
        //Debugbar::info($cart_articles_custom);
        
        // return view
        return view('cart_index', ['cart_articles_custom' => $cart_articles_custom]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['product_quantity']>0)
        {
            
            if($this->cartRepositoryInterface->cartExist($request->all()))
            {
                $this->cartRepositoryInterface->setCart($request->all());
            }
            else
            {
                $this->cartRepositoryInterface->addCart($request->all());
            }
            
            return redirect()->back()->with("ok","Votre produit a bien ete ajoute dans le panier");
        }
        else 
        {
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->cartRepositoryInterface->cartExist($request->all()))
        {
            $this->cartRepositoryInterface->updateCart($request->all(),$id);
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        // delete cart
        $this->cartRepositoryInterface->deleteCart($id);
        
        return redirect()->back();
        
    }
    
    public function confirm()
    {
        // Get default addresses
        $addressRepository = new AddressRepository(new Address);
        $user_default_billing_address = $addressRepository->getDefaultBillingAddressByUserId(Auth::user()->id);
        $user_default_shipping_address = $addressRepository->getDefaultShippingAddressByUserId(Auth::user()->id);
        
        // Get all cart referenced to this user
        $cart_articles = $this->cartRepositoryInterface->getCartByUser(Auth::user()->id);
        $cart_articles_custom = $this->cartRepositoryInterface->transformCartArticlesIntoCustomCollection($cart_articles);
        
        // test
        //Debugbar::info($user_default_billing_address);
        //Debugbar::info($user_default_shipping_address);
        //Debugbar::info($cart_articles_custom);
        
        return view('cart_confirm',['user_default_billing_address' => $user_default_billing_address, 'user_default_shipping_address' => $user_default_shipping_address, 'cart_articles_custom' => $cart_articles_custom]);
    
    }
}
