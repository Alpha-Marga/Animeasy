<?php

class activite{
    private int $NumActivite;
    private string $LibelleCategorie;
    private string $Designation;
    private string $Description;
    private int $NbMin_Participant;
    private int $NbMax_Participant;
    private string $cheminP;
    private array $lesEnfantsAptes;
    
 
    public function __construct(int $unNum, string $libelleCat, string $uneDesignation, string $uneDescription, int $NbMin, int $NbMax, string $chemin,  array $CollectionEnfant){
        $this->NumActivite = $unNum;
        $this->LibelleCategorie = $libelleCat;
        $this->Designation = $uneDesignation;
        $this->Description = $uneDescription;
        $this->NbMin_Participant = $NbMin;
        $this->NbMax_Participant = $NbMax;
        $this->cheminP = $chemin;
        $this->lesEnfantsAptes= $CollectionEnfant;
    }
    
    public function ajoutEnfantApte(enfant $unEnfant){
        $this->lesEnfantsAptes[]= $unEnfant;
    }
    
    public function suppEnfant(int $unNumEnfant){
        $tab =array();
        for($i=0; $i<count($this->lesEnfantsAptes); $i++){
            $tab[]= $this->lesEnfantsAptes[$i]->getNumPersonne();
        }
        if(in_array($unNumEnfant, $tab)){
        $j = 0;
        while($this->lesEnfantsAptes[$j]->getNumPersonne() != $unNumEnfant && $j < count($this->lesEnfantsAptes)){
            $j++;
        }
        if ($j < count($this->lesEnfantsAptes)){
            unset($this->lesEnfantsAptes[$j]);
        }
        else{
            echo("Le numéro saisi n'existe pas !");
        }
    }
    }
    
    public function getNumActivite():int{
        return $this->NumActivite;
    }
    
    public function getLibelleCategorie():string{
        return $this->LibelleCategorie;
    }
    
     public function getDesignationActivite():string{
        return $this->Designation;
    }
    
     public function getDescription():string{
        return $this->Description;
    }
    
     public function getNbMax():int{
        return $this->NbMax_Participant;
    }
    
    public function getNbMin():int{
        return $this->NbMin_Participant;
    }
    
    public function getPhotoActivite(){
        return $this->cheminP;
    }
    
    
    public function getEnfantApte(){
       
        for($i=0; $i<count($this->lesEnfantsAptes); $i++){
            print($this->lesEnfantsAptes[$i]->getNom()."   ".$this->lesEnfantsAptes[$i]->getPrenom()."   ".
                  "<i>".$this->lesEnfantsAptes[$i]->getAge()."  ans"."</i>"."<br/><br/>");
          
        }
      
    }
    
}
