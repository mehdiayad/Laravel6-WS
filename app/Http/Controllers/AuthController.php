<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class AuthController extends Controller
{
    protected $authRepositoryInterface;
    protected $response;
    protected $limitToken;
    
    public function __construct(AuthRepositoryInterface $authRepositoryInterface)
    {
        $this->authRepositoryInterface = $authRepositoryInterface;
        $this->limitToken = 3;
        
        $this->response = array();
        $this->response['userEmail'] = null;
        $this->response['userConnected'] = false;
        $this->response['userId'] = null;
        $this->response['userName'] = null;
        $this->response['errorCode'] = null;
        $this->response['errorDescription'] = null;
        $this->response['errorType'] = null;
        $this->response['tokenType'] = null;
        $this->response['expiresIn'] = null;
        $this->response['expiresAt'] = null;
        $this->response['createdAt'] = null;
        $this->response['accessToken'] = null;
        $this->response['refreshToken'] = null;
        
    }    
    
    public function loginPassportGrantToken(Request $request)
    {
        
        //Variables
        $userRepository = new UserRepository(new User);
        $this->response['userEmail'] = $request->email;
        $this->response['userInformations'] =  "Connexion via Passport Grant";
        
        
        if($userRepository->existByEmail($request->email)){
                        
            $user = $userRepository->getInformations($request->email);
            $this->response['userId'] = $user->id;
            $this->response['userName'] = $user->name;
                    
            if($this->authRepositoryInterface->countAccessTokenByUserId($user->id) >= $this->limitToken){
                $this->authRepositoryInterface->deleteOlderAccessTokenByUserId($user->id, $this->limitToken);
            }
            
            if($this->authRepositoryInterface->countRefreshTokenByUserId($user->id) >= $this->limitToken){
                $this->authRepositoryInterface->deleteOlderRefreshTokenByUserId($user->id, $this->limitToken);
            }

            $http = new Client;
            
            try {
                $response = $http->post(config('services.passport.login_endpoint_token'), [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => config('services.passport.client_id'),
                        'client_secret' => config('services.passport.client_secret'),
                        'username' => $request->email,
                        'password' => $request->password,
                    ]
                ]);
                
                $dataJson = $response->getBody();
                $dataArray = json_decode($dataJson, true);                
                
                $date = new DateTime();
                $timestamp1 = $date->getTimestamp();
                $timestamp2 = (string) ((int) $timestamp1 + (int) $dataArray['expires_in']);
                $this->response['createdAt'] = date("Y/m/d H:i:s",$timestamp1);
                $this->response['expiresAt'] = date("Y/m/d H:i:s",$timestamp2);
                $this->response['tokenType'] = $dataArray['token_type'];
                $this->response['accessToken'] = $dataArray['access_token'];
                $this->response['refreshToken'] = $dataArray['refresh_token'];
                $this->response['expiresIn'] = $dataArray['expires_in'];
                $this->response['userConnected'] = true;
                
                
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                
                // GENERAL ERROR
                //return response()->json('Something went wrong on the server.', $e->getCode());
                $dataArray = json_decode($e->getResponse()->getBody(), true);
                $this->response['errorCode'] = $e->getCode();
                $this->response['errorDescription'] = $e->getMessage();
                $this->response['errorType'] = $dataArray['error'];
            }            
            
        }else{
            // Email not exist break
            $this->response['errorCode'] = 400;
            $this->response['errorType'] = "invalid_email";
            $this->response['errorDescription'] = "Email used doesn't exist in the database";
        }
                
        return $this->response;
        
    }
    
    public function loginPassportClientToken(Request $request){
        
        //Variables
        $userRepository = new UserRepository(new User);
        $this->response['userInformations'] =  "Connexion via Passport Client";
        $this->response['userEmail'] = $request->email;
        $codeClient = $request->code;
        
        if($userRepository->existByEmail($request->email)){
            
            $user = $userRepository->getInformations($request->email);
            $this->response['userId'] = $user->id;
            $this->response['userName'] = $user->name;
            $http = new Client;
            
            if($this->authRepositoryInterface->existOauthClientById($user->id)){
                
                $data = $this->authRepositoryInterface->getOauthClient($user->id);
                
                //Variables
                $clientId = $data->id;
                $clientSecret = $data->secret;
                $clientRedirect = $data->redirect;
                
                if($this->authRepositoryInterface->countAccessTokenByUserId($user->id) >= $this->limitToken){
                    $this->authRepositoryInterface->deleteOlderAccessTokenByUserId($user->id, $this->limitToken);
                }
                
                if($this->authRepositoryInterface->countRefreshTokenByUserId($user->id) >= $this->limitToken){
                    $this->authRepositoryInterface->deleteOlderRefreshTokenByUserId($user->id, $this->limitToken);
                }
                
                if($this->authRepositoryInterface->countAuthCodesByUserId($user->id) >= $this->limitToken){
                    $this->authRepositoryInterface->deleteOlderAuthCodesByUserId($user->id, $this->limitToken);
                }
                
                try {
                    
                    $response = $http->post(config('services.passport.login_endpoint_token'), [
                        'form_params' => [
                            'grant_type' => 'authorization_code',
                            'client_id' => $clientId,
                            'client_secret' => $clientSecret,
                            'redirect_uri' => $clientRedirect,
                            'code' => $codeClient
                        ]
                    ]);
                    
                    $dataJson = $response->getBody();
                    $dataArray = json_decode($dataJson, true);
                    
                    $date = new DateTime();
                    $timestamp1 = $date->getTimestamp();
                    $timestamp2 = (string) ((int) $timestamp1 + (int) $dataArray['expires_in']);
                    $this->response['createdAt'] = date("Y/m/d H:i:s",$timestamp1);
                    $this->response['expiresAt'] = date("Y/m/d H:i:s",$timestamp2);
                    $this->response['tokenType'] = $dataArray['token_type'];
                    $this->response['accessToken'] = $dataArray['access_token'];
                    $this->response['refreshToken'] = $dataArray['refresh_token'];
                    $this->response['expiresIn'] = $dataArray['expires_in'];
                    $this->response['userConnected'] = true;
                    
                    
                } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                    
                    // GENERAL ERROR
                    //return response()->json('Something went wrong on the server.', $e->getCode());
                    $dataArray = json_decode($e->getResponse()->getBody(), true);
                    $this->response['errorCode'] = $e->getCode();
                    $this->response['errorDescription'] = $e->getMessage();
                    $this->response['errorType'] = $dataArray['error'];
                }
            }else{
                
                // User not exist in the oauth client database
                $this->response['errorCode'] = 400;
                $this->response['errorType'] = "undeclared_user";
                $this->response['errorDescription'] = "This user exist but not present in the oauth_client database.";
                    
            }
            
        }else{
            
            // Email not exist in the database
            $this->response['errorCode'] = 400;
            $this->response['errorType'] = "invalid_email";
            $this->response['errorDescription'] = "Email used doesn't exist in the database";
        }
        
        return $this->response;
        
        
    }
    
    public function generateAuthorizeUrl(Request $request){
        
        $userRepository = new UserRepository(new User);
        $this->response['apiUrl'] = null;
        
        if($userRepository->existByEmail($request->email)){
            
            $user = $userRepository->getInformations($request->email);
            $response = $this->authRepositoryInterface->getOauthClient($user->id);
            
            if($response  != null){
                $apiUrl = config('services.passport.login_endpoint_authorize')."?client_id=".$response->id."&redirect_uri=".$response->redirect."&response_type=code";
                $this->response['apiUrl'] = $apiUrl;
                
            }else{
                // User not exist in the oauth client database
                $this->response['errorCode'] = 400;
                $this->response['errorType'] = "undeclared_user";
                $this->response['errorDescription'] = "This user exist but not present in the oauth_client database.";
            }
        
        }else{
            
            // Email not exist in the database
            $this->response['errorCode'] = 400;
            $this->response['errorType'] = "invalid_email";
            $this->response['errorDescription'] = "Email used doesn't exist in the database";
        }
                         
        return $this->response;
        
    }
    
      
    public function loginPassportTest(Request $request){
                                
        $http = new Client;
        $userToken = $request->clientAccessToken;
        $tab = array();
        
        try {
            
            $response = $http->get('http://localhost:8888/Laravel-WS/public/api/user/1', [
                'headers' => [
                    'Authorization' => 'Bearer '.$userToken,
                    'Accept' => 'application/json',
                ],
            ]);
            
            $tab['state'] = 'success';
            $tab['data'] = $response->getBody()->getContents();
            return $tab;
            
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            
            $tab['state'] = 'error';
            $tab['errorCode'] = $e->getCode();
            $tab['errorDescription'] = $e->getMessage();
            return $tab;
            
            
        }
                
    }
    
}
