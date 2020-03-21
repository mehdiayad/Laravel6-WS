<?php

namespace App\Repositories;

use App\Model\OauthAccessToken;
use App\Model\OauthAuthCodes;
use App\Model\OauthClient;
use App\Model\OauthRefreshToken;


class AuthRepository implements AuthRepositoryInterface
{
 
    protected $oauthAccessToken;
    protected $oauthRefreshToken;
    protected $oauthClient;
    protected $oauthAuthCodes;
    
 
    
    public function __construct(OauthAccessToken $oauthAccessToken, OauthRefreshToken $oauthRefreshToken, OauthClient $oauthClient, OauthAuthCodes $oauthAuthCodes)
    {
        $this->oauthAccessToken = $oauthAccessToken;
        $this->oauthRefreshToken = $oauthRefreshToken;
        $this->oauthClient = $oauthClient;
        $this->oauthAuthCodes = $oauthAuthCodes;
    }
    

 
    
    public function getExistingAccessTokenByUserId($userId){
        
        return $this->oauthAccessToken::where('user_id', '=', $userId)->get();
        
    }
    
    public function countAccessTokenByUserId($userId){
        
        return $this->oauthAccessToken::where('user_id', '=', $userId)->count();
    }
    
    public function countRefreshTokenByUserId($userId){
        
        return $this->oauthRefreshToken::count();
        
    }
    
    public function countAuthCodesByUserId($userId){
        
        return $this->oauthAuthCodes::where('user_id', '=', $userId)->count();
        
    }
    
    public function deleteOlderAccessTokenByUserId($userId, $limitToken){
        
        $tokens = $this->oauthAccessToken::where('user_id', '=', $userId)->orderBy('created_at', 'asc')->get();
        
        for($i=0; $i<=($tokens->count()-$limitToken); $i++){
            
            $token = $tokens->get($i);
            $token->delete();
        }
                            
    }
    
    public function deleteOlderRefreshTokenByUserId($userId, $limitToken){
        
        $tokens = $this->oauthRefreshToken::orderBy('expires_at', 'asc')->get();
        
        for($i=0; $i<=($tokens->count()-$limitToken); $i++){
            
            $token = $tokens->get($i);
            $token->delete();
        }
        
    }
    
    public function deleteOlderAuthCodesByUserId($userId, $limitToken){
        
        $codes = $this->oauthAuthCodes::where('user_id', '=', $userId)->orderBy('expires_at', 'asc')->get();
        
        for($i=0; $i<=($codes->count()-$limitToken); $i++){
            
            $code = $codes->get($i);
            $code->delete();
        }
        
    }
    
    
    public function existOauthClientById($userId){
        
        $response =  $this->oauthClient::where('user_id', '=', $userId)->count();
        
        if($response>0){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function getOauthClient($userId){
        
        $client = null;
        $response =  $this->oauthClient::where('user_id', '=', $userId)->get();
        
        if($response->count()>0){
            $client=$response->first();
        }
        
        return $client;
        
    }
    
    public function getOauthClients(){
        
        $response =  $this->oauthClient->get();
        return $response;
        
    }
    
}