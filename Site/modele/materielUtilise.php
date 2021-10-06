<?php

class MaterielUtilise{
    private activite $l_activite;
    private materiel $unMateriel;
    private int $quantite;
    
    public function __construct($activite, $materiel, int $uneQte){
        $this->l_activite = $activite;
        $this->unMateriel = $materiel;
        $this->quantite = $uneQte; 
    }
    
    public function getActiviteUtilise(){
        return $this->l_activite;
    }
    
    public function getMaterielUtilise(){
        return $this->unMateriel;
    }
    
    public function getQuantite():int{
        return $this->quantite;
    }
    
}

