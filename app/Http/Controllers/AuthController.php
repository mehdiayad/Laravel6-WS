<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepositoryInterface;
    protected $response;
    protected $limitToken;
    
    public function __construct(AuthRepositoryInterface $authRepositoryInterface)
    {
        $this->authRepositoryInterface = $authRepositoryInterface;
        
        $this->limitToken = 6;
        
        // initialize
        $this->response = array();
        $this->response['userInformations'] =  "Connexion via Passport Authentification";
        $this->response['userEmail'] = null;
        $this->response['userConnected'] = false;
        $this->response['userId'] = null;
        $this->response['userName'] = null;
        $this->response['errorCode'] = null;
        $this->response['errorDescription'] = null;
        $this->response['errorType'] = null;
        $this->response['tokenType'] = null;
        $this->response['expiresIn'] = null;
        $this->response['accessToken'] = null;
        $this->response['refreshToken'] = null;
        
    }    
    
    public function loginPassportGrantToken(Request $request)
    {
        
        //Variables
        $userRepository = new UserRepository(new User);
        $this->response['userEmail'] = $request->email;
        
        if($userRepository->existByEmail($request->email)){
                        
            $user = $userRepository->getInformations($request->email);
            $this->response['userId'] = $user->id;
            $this->response['userName'] = $user->name;
                    
            if($this->authRepositoryInterface->countAccessTokenByUserId($user->id) >= $this->limitToken){
                $this->authRepositoryInterface->deleteOlderAccessTokenByUserId($user->id, $this->limitToken);
            }
            
            $http = new Client;
            try {
                $response = $http->post(config('services.passport.login_endpoint'), [
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
                $this->response['tokenType'] = $dataArray['token_type'];
                $this->response['expiresIn'] = $dataArray['expires_in'];
                $this->response['accessToken'] = $dataArray['access_token'];
                $this->response['refreshToken'] = $dataArray['refresh_token'];
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
        
        // TODO
    }
    
    public function loginPassportPersonalToken(Request $request){
        
        // TODO
    }
    
}
