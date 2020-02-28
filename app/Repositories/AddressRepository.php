<?php

namespace App\Repositories;

use App\Model\Address;

//use Debugbar;

class AddressRepository implements AddressRepositoryInterface
{
    protected $address;
    
    public function __construct(Address $address)
    {
        $this->address = $address;
    }
    
    public function getBillingAddressesByUserId($user_id)
    {
        return $this->address::where('user_id', '=',$user_id)->where('is_billing', '=','1')->where('active', '=','1')->get();
    }
    
    public function getShippingAddressesByUserId($user_id)
    {
        return $this->address::where('user_id', '=',$user_id)->where('is_shipping', '=','1')->where('active', '=','1')->get();
    }
    
    public function getDefaultBillingAddressByUserId($user_id)
    {
        $user_default_billing_address = null;
        
        $response =  $this->address::where('user_id', '=',$user_id)->where('is_billing', '=','1')->where('is_default', '=','1')->where('active', '=','1')->get();

        if($response->count()>0)
        {
            $user_default_billing_address = $response->first();
        }
       
        return $user_default_billing_address;
        
    }
    
    public function getDefaultShippingAddressByUserId($user_id)
    {
        $user_default_shipping_address = null;
        
        $response = $this->address::where('user_id', '=',$user_id)->where('is_shipping', '=','1')->where('is_default', '=','1')->where('active', '=','1')->get();
        
        if($response->count()>0)
        {
            $user_default_shipping_address = $response->first();
        }
        
        return $user_default_shipping_address;
        
    }
  
}