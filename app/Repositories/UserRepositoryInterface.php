<?php
namespace App\Repositories;

use App\Model\User;

interface UserRepositoryInterface
{
    public function getPaginate($n);
    
    public function save(User $user, Array $inputs);
    
    public function store(Array $inputs);
    
    public function getById($id);
    
    public function update($id, Array $inputs);
    
    public function destroy($id);
        
    
}

