<?php

class materiel{
   private string $CodeMateriel ;
   private string $libelleMateriel;
   
   public function __construct(string $unCode, string $unlibelle){
       $this->CodeMateriel = $unCode;
       $this->libelleMateriel = $unlibelle;
   }
   
   public function getCodeMateriel():string{
       return $this->CodeMateriel;
   }
   
    public function getLibelleMateriel():string{
       return $this->libelleMateriel;
   }
}