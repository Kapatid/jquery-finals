<?php

class CorporateTraining extends Database 
{
    private $db;
    private int $id;
    private string $title;
    private string $description;
    private string $programDuration;
    private string $admisionContact;
    private array $programsOffered;

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
     * @return array<CorporateTraining>
     */
    public function getCorporateTrainings(): array
    {
        $data = $this->db->getAll(TableName::CorporateTraining);
        $cts = array();

        foreach ($data as $corporateTraining) {
            $ct = new CorporateTraining($corporateTraining);

            array_push($cts, $ct);
        }

        return $cts;
    }

    public function ctRegister(object $obj) {
        $this->db->post(TableName::CTResgisters, $obj);
    }
}