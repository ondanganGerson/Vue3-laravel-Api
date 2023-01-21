<?php

namespace App\Adapters;

use Exception;

class RepositoryAdapter
{
    // private $repositoryName = '';
    
    // public function __construct($repositoryName)
    // {
    //     $this->repositoryName   =   $repositoryName;
    // }

    public function __construct(private $repositoryName){}

    public function getInstance($repositoryNames = null)
    {
        if($repositoryNames  == null){
            $repositoryName = $this->repositoryName;
        }
        $modelName = "App\\Models\\$repositoryName";
        if($repositoryName){
            return new $modelName();
        } else {
            throw new Exception("Model: $modelName not found");
        } 
    }

}