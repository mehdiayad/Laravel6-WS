<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function loginOne(Request $request)
    {
        $userRepository = new UserRepository( new User);
        $response = $userRepository->loginCheck($request->all());
        return response($response,200);
    }
    
    public function loginTwo(Request $request)
    {
        //TEST
        $tab = array();
        $tab['userId'] = 6; // Temp
        $tab['userName'] = 'superviseur'; // Temp
        $tab['userEmail'] = $request->username;
        $tab['userConnected'] = false;
        $tab['userInformations'] =  "Connexion via Passport Authentification";
        
        $http = new Client;
        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
                    ]
            ]);
            //return $response->getBody();
            $dataJson = $response->getBody();
            $dataArray = json_decode($dataJson, true);
            $tab['token_type'] = $dataArray['token_type'];
            $tab['expires_in'] = $dataArray['expires_in'];
            $tab['access_token'] = $dataArray['access_token'];
            $tab['refresh_token'] = $dataArray['refresh_token'];
            $tab['userConnected'] = true;            
            return $tab;
            

            
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }
    
}
