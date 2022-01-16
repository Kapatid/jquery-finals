<?php

// Check if Heroku env variables does not exist.
if (!getenv('API_URL')) {
    (new DotEnv('./.env'))->load();
}

class Database 
{
    
    private $apiUrl;

    function __construct() { $this->apiUrl = getenv('API_URL'); }

    /**
     * Get all rows inside a table
     */
    protected function getAll(string $table_name) 
    {
        if(TableName::isValidName($table_name)) {
            $json = file_get_contents($this->apiUrl.$table_name);

            $obj = json_decode($json, true);

            return $obj;
        }
    }
}