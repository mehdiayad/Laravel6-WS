<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;



class OauthRefreshToken extends Model
{
    protected $table = 'oauth_refresh_tokens';
    
    public $timestamps = false;

}
