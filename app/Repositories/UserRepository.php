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
         return $this->user::where('active', '=', '1')->paginate($n);
        
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
    
}