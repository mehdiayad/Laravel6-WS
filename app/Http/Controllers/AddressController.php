<?php

namespace App\Http\Controllers;

use App\Repositories\AddressRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    
    protected $addressRepositoryInterface;
    
    public function __construct(AddressRepositoryInterface $addressRepositoryInterface)
    {
        //$this->middleware('auth');
        //$this->middleware('auth:api');
        $this->addressRepositoryInterface = $addressRepositoryInterface;
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
        $addresses = null;
        
        // get data
        if( Auth::user() != null && Auth::user()->id != null){
            $user_id = Auth::user()->id;
        }
        
        $user_billing_addresses = $this->addressRepositoryInterface->getBillingAddressesByUserId($user_id);
        $user_shipping_addresses = $this->addressRepositoryInterface->getShippingAddressesByUserId($user_id);
       
        $addresses['billing']= $user_billing_addresses; 
        $addresses['shipping'] = $user_shipping_addresses;
        
        return $addresses;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }
    

}
