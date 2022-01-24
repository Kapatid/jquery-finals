<?php

// Check if Heroku env variables does not exist.
if (!getenv('API_URL')) {
    (new DotEnv('./.env'))->load();
}

class Database {
    
    private $apiUrl;

    function __construct() { $this->apiUrl = getenv('API_URL'); }

    /**
     * Get all rows inside a table
     */
    protected function getAll(string $table_name) 
    {
        $json = file_get_contents($this->apiUrl.$table_name);

        $obj = json_decode($json, true);

        return $obj;
    }

    protected function post(string $table_name, object $obj) 
    { 
        try {
            $url = $this->apiUrl.$table_name;

            $postdata = http_build_query(get_object_vars($obj));

            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                )
            );

            $context  = stream_context_create($opts);

            $result = file_get_contents($url, false, $context);
            return $result;
        } catch (\Throwable $th) {
            return null;
        }
    }
}