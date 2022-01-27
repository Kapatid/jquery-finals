<?php

class BachelorsDegree extends Database 
{
    private Database $db;
    private int $id;
    private string $title;
    private string $subtitle;
    private string $description;
    private string $wywl;
    private string $programDuration;
    private string $admisionContact;
    private string $downloads;
    private array $specializedSubjects;
    private array $scholarships;

    function __construct($params = array()) 
    { 
        $this->db = new Database(); 
        foreach ($params as $key => $val) {
            if(property_exists(__CLASS__,$key)) {
                $this->$key = $val;
            }
        }
    }

    public function __get($property) 
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    /**
     * @return array<BachelorsDegree>
     */
    public function getBachelorsDegrees(): array
    {
        $data = $this->db->getAll('bachelorsDegrees');
        $bds = array();

        foreach ($data as $bachelorsDegree) {
            $bd = new BachelorsDegree($bachelorsDegree);

            array_push($bds, $bd);
        }

        return $bds;
    }
}