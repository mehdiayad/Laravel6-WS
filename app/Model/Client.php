<?php
namespace App\Model;

use Laravel\Passport\Client as PassportClient;

class Client extends PassportClient
{
    /**
     * Determine if the client should skip the authorization prompt.
     *
     * @return bool
     */
    public function skipsAuthorization()
    {
        // override default behavior
        //return true;
        
        return $this->firstParty();
        
    }

}
