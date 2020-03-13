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
        $tab['username'] = $request->username;
        $tab['password'] = $request->password;
        $tab['url'] = $request->url;
        $tab['loginEndpoint'] = config('services.passport.login_endpoint');
        $tab['clientId'] = config('services.passport.client_id');
        $tab['clientSecret'] = config('services.passport.client_secret');
        $http = new Client;
        //return $tab;

        try {
            $response = $http->post( addslashes(config('services.passport.login_endpoint')), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);
            return $response->getBody();
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
