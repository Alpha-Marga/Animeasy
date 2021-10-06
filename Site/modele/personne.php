<?php

class personne{
    private int $numPersonne;
    private string $nom;
    private  string $prenom;
    
    public function __construct($unNumero, $unNom, $unPrenom){
        $this->numPersonne = $unNumero;
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
    }
    
    public function getNumPersonne():int{
        return $this->numPersonne;
    }
    
    public function getNom():string{
        return $this->nom;
    }
    
    public function getPrenom():string{
        return $this->prenom;
    }
}

