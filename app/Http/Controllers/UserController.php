<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepositoryInterface;
    
    protected $nbrPerPage = 5;
    
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        //$this->middleware('auth');
        $this->middleware('auth:api');
        $this->userRepositoryInterface = $userRepositoryInterface;
    }
    
    public function index()
    {   
        $users = $this->userRepositoryInterface->getPaginate($this->nbrPerPage);
        
        return $users;    
    }
    
    public function create()
    {
        //return view('user_create');
    }
    
    public function store(UserCreateRequest $request)
    {
        $this->setAdmin($request);
        
        $user = $this->userRepositoryInterface->store($request->all());
        
        return redirect('user')->with("ok","L'utilisateur " . $user->name . " a été créé.");
    }
    
    public function show($id)
    {
        $user = $this->userRepositoryInterface->getById($id);
        
        return $user;
    }
    
    public function edit($id)
    {
        $user = $this->userRepositoryInterface->getById($id);
        
        return view('user_edit', compact('user'));
        // view('user2_edit', compact('user')) = view('user2_edit', ['user' => $user])
        
    }
    
    //public function update(UserUpdateRequest $request, $id)
    public function update(Request $request, $id)
    {
        $this->setAdmin($request);
        
        $response = $this->userRepositoryInterface->update($id, $request->all());
        
        return (String)$response;
    }
    
    public function destroy($id)
    {
        $this->userRepositoryInterface->destroy($id);
        
        return back();
    }

    
    public function test()
    {
        // variable
        $user = new User();
        $user->name="test";
       
        // get data
        if( Auth::user() != null && Auth::user()->id != null){
            $user = Auth::user();
        }
        
        return $user;
    }
    
    private function setAdmin($request)
    {
        // admin not sended if not selected
        // need to set a defaylt value
        if(!$request->has('admin'))
        {
            $request->merge(['admin' => 0]);
        }
    }
    
}