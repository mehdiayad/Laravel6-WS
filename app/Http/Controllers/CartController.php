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
        //$this->middleware('auth');
        $this->middleware('auth:api');
        $this->cartRepositoryInterface = $cartRepositoryInterface;
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // variable
        $user_id = 0;
        
        // get data
        if( Auth::user() != null && Auth::user()->id != null){
            $user_id = Auth::user()->id;
        }
        
        // Get all cart referenced to this user
        $cart_articles = $this->cartRepositoryInterface->getCartByUser($user_id);        
        $cart_articles_custom = $this->cartRepositoryInterface->transformCartArticlesIntoCustomCollection($user_id,$cart_articles);
                
        //Debugbar::info($cart_articles);
        //Debugbar::info($cart_articles_custom);
        
        // return view
        return $cart_articles_custom;
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
        $store = false;
        $method = 'none';

        if($request['product_quantity']>0)
        {
            
            if($this->cartRepositoryInterface->cartExist($request->all()))
            {
                $this->cartRepositoryInterface->setCart($request->all());

                $store = true;

                $method = 'update';

            }
            else
            {
                $this->cartRepositoryInterface->addCart($request->all());

                $store = true;

                $method = 'add';

            }
        }

        return array('isStored' => $store,'method' => $method); 
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
        $id = intval($id);
        $type = gettype($id);
        $store = false;
        
        //return array('isStored' => $store, 'id' => $id, 'type' => $type); 

        if($this->cartRepositoryInterface->cartExist($request->all()))
        {
            $this->cartRepositoryInterface->updateCart($request->all(),$id);
            $store=true;

        }
        
        return array('isStored' => $store, 'id' => $id, 'type' => $type); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $isDeleted= false;
        $method = 'none';

        if($this->cartRepositoryInterface->cartExistById($id)){

            // delete cart
            $this->cartRepositoryInterface->deleteCart($id);
            $isDeleted= true;
            $method = 'destroy';
        }

        return array('isDeleted' => $isDeleted,'method' => $method); 
        
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
    
    public function getCartNumber()
    {
        // variable
        $user_id = 0;
        
        // get data
        if( Auth::user() != null && Auth::user()->id != null){
            $user_id = Auth::user()->id;
        }
        
        $cart_articles = $this->cartRepositoryInterface->getCartNumberSession($user_id);
        return $cart_articles;
    }
    
    public function getCartProductNumber(Request $request)
    {
        // variable
        $user_id = 0;
        $product_id = 0;
        
        // get data
        if( Auth::user() != null && Auth::user()->id != null){
            $user_id = Auth::user()->id;
        }
        if($request->product_id != null){
            $product_id = $request->product_id;
        }
        
        $cart_articles = $this->cartRepositoryInterface->getCartByUserAndProduct($user_id,$product_id);
        return $cart_articles;
    }
}
