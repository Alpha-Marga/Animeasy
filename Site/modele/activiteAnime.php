<?php

class activiteAnime{
    private activite $uneActivite;
    private array $lesAnimateurs;
    private string $dateActivite;
    private string $heureDebut;
    private string $heureFin;
    
    public function __construct(activite $lActivite, array $collectionAnimateur, string $laDate, string $heureDbu, string $heureFn){
        $this->uneActivite = $lActivite;
        $this->lesAnimateurs= $collectionAnimateur;
        $this->dateActivite = $laDate;
        $this->heureDebut = $heureDbu;
        $this->heureFin = $heureFn;
    }
     
    public function ajoutAnimateur(animateur $unAnimateur){
        $this->lesAnimateurs[] = $unAnimateur;
    }
    
    public function supprimerAnimateur(int $unNumAnimateur){
        $i = 0;
        while($this->lesAnimateurs[$i]->getNumAnimateur() != $unNumAnimateur && $i < count($this->lesAnimateurs)){
            $i++;
        }
        if ($i < count($this->lesAnimateurs)){
            unset($this->lesAnimateurs[$i]);
        }
        else{
            echo("Le numéro saisi n'existe pas !");
        }
    }
    
    public function getActiviteAnime(){
        return $this->uneActivite;
    }
    
    public function getAnimateurs():array{
        return $this->lesAnimateurs;
    }
    
    public function getUnAnimateur($i){
        return $this->lesAnimateurs[$i];
    }
    
    public function getDateActivite(){
        return $this->dateActivite;
    }
    
    public function getHeureDebut(){
        return $this->heureDebut;
    }
    
    public function getHeureFin(){
        return $this->heureFin;
    }
    
    public function afficherAnimateurs(){
        for($i=0; $i<count($this->lesAnimateurs); $i++){
            print($this->lesAnimateurs[$i]->getNom()." ".$this->lesAnimateurs[$i]->getPrenom()."<br/>");
        }
    }
    
    
}

