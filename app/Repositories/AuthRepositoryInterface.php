<?php
namespace App\Repositories;


interface AuthRepositoryInterface
{
    public function getExistingAccessTokenByUserId($userId); // CAN'T GET ID TOKEN VALUE
        
    public function countAccessTokenByUserId($userId);
    
    public function countRefreshTokenByUserId($userId);
    
    public function countAuthCodesByUserId($userId);
        
    public function deleteOlderAccessTokenByUserId($userId, $limitToken);
    
    public function deleteOlderRefreshTokenByUserId($userId, $limitToken);
    
    public function deleteOlderAuthCodesByUserId($userId, $limitToken);
 
    public function getOauthClient($userId);
    
    public function getOauthClients();
        
    public function getAccessTokens();
        
        
}

