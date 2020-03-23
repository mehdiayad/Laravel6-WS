<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    protected $table = 'oauth_clients';
    
    public $timestamps = false;

}
