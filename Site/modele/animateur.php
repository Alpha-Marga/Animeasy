<?php
include_once("modele/personne.php");

class animateur extends personne{
    private string $Adresse;
    private int $CPostale;
    private string $Ville;
    private string $telephone;
    
    public function __construct(int $Numero, string $Nom, string $Prenom, string $uneAdresse, int $CP, string $uneVille, string $Tel){
        parent::__construct($Numero, $Nom, $Prenom);
        $this->Adresse = $uneAdresse;
        $this->CPostale = $CP;
        $this->Ville = $uneVille;
        $this->telephone = $Tel;
    }
    
    public function getAdresse(){
        return $this->Adresse.", ".$this->CPostale." ".$this->Ville;
    }
    
    public function getTelephone(){
        return $this->telephone;
    }
}

