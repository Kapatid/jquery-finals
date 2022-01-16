<?php

class BachelorsDegree extends Database 
{
    private $db;

    function __construct() { $this->db = new Database(); }

    public function getBachelorsDegrees() 
    {
        return $this->db->getAll(TableName::BachelorsDegrees);
    }
}