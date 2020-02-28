<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseRepository implements DatabaseRepositoryInterface
{
    
    public function checkDatabase($databaseName)
    {
        $response1 = null;
        $response2 = 0;
        
        $response1 = DB::connection('mysql_schema')->select("SELECT * FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?",[$databaseName]);
        
        if(isset($response1) && count($response1) > 0)
        {
            $response2 = 1;
        }
        
        return $response2;
    }
    
    public function checkTable($tableName)
    {
        $response = null;
        
        $response = Schema::hasTable($tableName);
        
        if(isset($response) && $response != 1)
        {
            $response = 0;
        }
        
        return $response;
    }
    
    public function emptyTable($tableName)
    {
        $response = 1;
        
        $count = DB::table($tableName)->count();
        
        if($count>0)
        {
            $response = 0;
        }
        
        return $response;
    }
    
    public function readyDatabase($databaseName, $tableName)
    {
        
        $db_ready = 0;
        
        if($this->checkDatabase($databaseName) && $this->checkTable($tableName) && (!$this->emptyTable($tableName)))
        {
            $db_ready = 1;
        }
        
        return $db_ready;
        
    }
    
    public function matchPasswords($pass1,$pass2)
    {
        return Hash::check($pass1,$pass2);
    }
    
}