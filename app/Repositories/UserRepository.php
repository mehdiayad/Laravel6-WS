<?php

namespace App\Repositories;

use App\Model\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    
    protected $user;
    
    public function __construct(User $user)
    {
        $this->user = $user;
                
    }
    
    public function getPaginate($n)
    {

        // display with ORM (pagination)
        // return $this->user::where('active', '=', '1')->paginate($n);

         return $this->user::where('active', '=', '1')->get();
        
        // display with Query builder (pagination)
        // return DB::table('users')->paginate($n);
        
        // display with Query RAW (pagination) cannot work with render()
        // return DB::select("select * from users where active = 1 limit ? offset 0", [$n]);
        
    }
    
    public function save(User $user, Array $inputs)
    {
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->login = $inputs['login'];
        $user->role= $inputs['role'];
        $user->admin = isset($inputs['admin']);
        
        $user->save();
    }
    

    
    public function store(Array $inputs)
    {           
        $user = new User;
        $user->password = Hash::make($inputs['password']);
        $this->save($user, $inputs);
        
        return $user;
    }
    
    public function getById($id)
    {
        return $this->user->findOrFail($id);
    }
    
    public function update($id, Array $inputs)
    {
        $user = $this->getById($id);
        $this->save($user, $inputs);
    }
    
    public function destroy($id)
    {
        $user = $this->getById($id);
        $user->active = '0';
        $user->save();

    }

    public function loginCheck(Array $inputs)
    {        
        // variables from request
        $email= $inputs['email'];
        $password = $inputs['password'];
        $name = null;
        $id = null;
        $informations = null;
        $connected = false;
        
        $response = $this->user::where('email', '=', $email)->where('active', '=', '1')->get();
        
        if($response->count()>0)
        {
            $temp = $response->first();
            
            if( Hash::check($password, $temp->password)) 
            {
                $id = $temp->id;
                $name = $temp->name;
                $connected=true;
                $informations = "Email/Password match succesfully";
            }
            else
            {
                $informations = "Password don't match";
            }
        }
        else
        {
            $informations = "Email don't exist in the database";
        }
        
        return array('userConnected' => $connected,'userId' => $id,  'userEmail' => $email, 'userName' => $name, 'userInformations' => $informations);        
            
    }
    
}