<?php
namespace App\Repositories;


interface AddressRepositoryInterface
{
    public function getBillingAddressesByUserId($user_id);
    
    public function getShippingAddressesByUserId($user_id);
    
    public function getDefaultBillingAddressByUserId($user_id);
    
    public function getDefaultShippingAddressByUserId($user_id);
}

