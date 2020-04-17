<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class OauthAuthCodes extends Model
{
    protected $table = 'oauth_auth_codes';
    
    public $timestamps = false;

}
