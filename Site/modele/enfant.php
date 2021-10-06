<?php
include_once("modele/personne.php");

class enfant extends personne{

    private  string $Age;
    
    public function __construct( int $leNumero, string $leNom, string $lePrenom, int $unAge){
        parent::__construct($leNumero, $leNom, $lePrenom);
        $this->Age = $unAge;
    }
    
    public function getAge():int{
        return $this->Age;
    }
}