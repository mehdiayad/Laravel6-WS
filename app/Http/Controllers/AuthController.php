<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function __construct()
    {
        // N/A
    }
    
    public function loginSimple(Request $request)
    {
        $userRepository = new UserRepository( new User);
        $response = $userRepository->loginCheck($request->all());
        return response($response,200);
    }
    
    public function loginPassport(Request $request)
    {
        
        // Variables
        $tab = array();
        $userRepository = new UserRepository(new User);
        
        // Initialize
        $tab['userInformations'] =  "Connexion via Passport Authentification";
        $tab['userEmail'] = $request->email;
        $tab['userConnected'] = false;
        $tab['userId'] = null;
        $tab['userName'] = null;
        $tab['errorCode'] = null;
        $tab['errorDescription'] = null;
        $tab['errorType'] = null;
        $tab['tokenType'] = null;
        $tab['expiresIn'] = null;
        $tab['accessToken'] = null;
        $tab['refreshToken'] = null;
        
        if($userRepository->existByEmail($request->email) == true){
            
            $user = $userRepository->getInformations($request->email);
            $tab['userId'] = $user->id;
            $tab['userName'] = $user->name;
            
            $this->createPasswordGrantAccessToken($request, $tab);
            
            
        }else{
            
            $tab['errorCode'] = 400;
            $tab['errorType'] = "invalid_email";
            $tab['errorDescription'] = "Email used doesn't exist in the database";
        }
        
        return $tab;
        
    }
    
    public function createPasswordGrantAccessToken(Request $request, Array &$tab){
        
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
            $tab['tokenType'] = $dataArray['token_type'];
            $tab['expiresIn'] = $dataArray['expires_in'];
            $tab['accessToken'] = $dataArray['access_token'];
            $tab['refreshToken'] = $dataArray['refresh_token'];
            $tab['userConnected'] = true;
            return $tab;
            
            
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            
            // GENERAL ERROR
            //return response()->json('Something went wrong on the server.', $e->getCode());
            
            // CUSTOM ERROR
            $dataJson = $e->getResponse()->getBody();
            $dataArray = json_decode($dataJson, true);
            $tab['errorCode'] = $e->getCode();
            $tab['errorDescription'] = $e->getMessage();
            $tab['errorType'] = $dataArray['error'];
            return $tab;
        }
        
    }
    
    public function passwordGrantAccessTokenExist(Request $request, Array &$tab){
        
      // TO COMPLETE
    
    }
    
    public function getPasswordGrantAccessToken(Request $request, Array &$tab){
        
        // TO COMPLETE
        
    }
        
    
}
