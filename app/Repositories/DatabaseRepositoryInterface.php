<?php

namespace App\Repositories;

interface DatabaseRepositoryInterface
{
    public function checkDatabase($databaseName);

    public function checkTable($tableName);
    
    public function emptyTable($tableName);
    
    public function readyDatabase($databaseName, $tableName);
 
    public function matchPasswords($pass1,$pass2);
    
}

