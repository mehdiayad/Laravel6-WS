<?php

namespace App\Repositories;

use App\Model\OauthAccessToken;
use App\Model\OauthRefreshToken;
use Carbon\Carbon;


class AuthRepository implements AuthRepositoryInterface
{
 
    protected $oauthAccessToken;
    protected $oauthRefreshToken;
 
    
    public function __construct(OauthAccessToken $oauthAccessToken, OauthRefreshToken $oauthRefreshToken)
    {
        $this->oauthAccessToken = $oauthAccessToken;
        $this->oauthRefreshToken = $oauthRefreshToken;
    }
    
    public function getExistingAccessTokenByUserId($userId){
        
        return $this->oauthAccessToken::where('user_id', '=', $userId)->get();
        
    }
    
    public function countAccessTokenByUserId($userId){
        
        return $this->oauthAccessToken::where('user_id', '=', $userId)->count();
        
    }
    
    public function deleteOlderAccessTokenByUserId($userId, $limitToken){
        
        $tokens = $this->oauthAccessToken::where('user_id', '=', $userId)->orderBy('created_at', 'asc')->get();
        
        for($i=0; $i<=$tokens->count()-$limitToken; $i++){
            
            $token = $tokens->get($i);
            $token->delete();
        }
                            
    }
    
}