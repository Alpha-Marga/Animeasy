<?php //

class animation{
    private int $numAnimation;
    private string $libelleAnimation;
    private string $theme;
    private string $presentation;
    private string $dateDebut;
    private string $dateFin;
    private string  $cheminPhoto;
    private array $tabEnfants;
    private array $tabAnimateurs;
    private array $tabActivites;
    
    public function __construct(int $unNum, string $libelle, string $untheme, string $unePresentation, string $uneDateDebut, string $uneDateFin, string $chemin, $collectionEnfant, $collectionAnimateur, $collectionActivite){
        $this->numAnimation = $unNum;
        $this->libelleAnimation = $libelle;
        $this->theme = $untheme;
        $this->presentation = $unePresentation;
        $this->dateDebut = $uneDateDebut;
        $this->dateFin = $uneDateFin;
        $this->cheminPhoto = $chemin;
        $this->tabEnfants = $collectionEnfant;
        $this->tabAnimateurs = $collectionAnimateur;
        $this->tabActivites = $collectionActivite;
        }
        
    public function participerEnfant(enfant $unEnfant){
        $this->tabEnfants[] = $unEnfant;
    }
    
    public function deleteEnfant(int $unNumEnfant){
        $tab =array();
        for($i=0; $i<count($this->tabEnfants); $i++){
            $tab[]= $this->tabEnfants[$i]->getNumPersonne();
        }
        if(in_array($unNumEnfant, $tab)){
        $j = 0;
        while($this->tabEnfants[$j]->getNumPersonne() != $unNumEnfant && $j < count($this->tabEnfants)){
            $j++;
        }
        if ($j < count($this->tabEnfants)){
            unset($this->tabEnfants[$j]);
        }
        else{
            echo("Le numéro saisi n'existe pas !");
        }
        }
    }
    
    public function participerAnimateur(animateur $unAnimateur){
        $this->tabAnimateurs[] = $unAnimateur;
    }
    
    public function deleteAnimateur(int $unNumAnimateur){
        $tab =array();
        for($i=0; $i<count($this->tabAnimateurs); $i++){
            $tab[]= $this->tabAnimateurs[$i]->getNumPersonne();
        }
        if(in_array($unNumAnimateur, $tab)){
        $j = 0;
        while($this->tabAnimateurs[$j]->getNumPersonne() != $unNumAnimateur && $j < count($this->tabAnimateurs)){
            $j++;
        }
            if ($j < count($this->tabAnimateurs)){
                unset($this->tabAnimateurs[$j]);
            }
            else{
                echo("Le numéro saisi n'existe pas !");
            }
        }
    }
    
    public function ajoutActivite(activite $uneActivite){
        $this->tabActivites[] = $uneActivite;
    }
    
    public function deleteActivite(int $unNumActivite){
        $tab =array();
        for($i=0; $i<count($this->tabActivites); $i++){
            $tab[]= $this->tabActivites[$i]->getNumActivite();
        }
        if(in_array($unNumActivite, $tab)){
        $j = 0;
        while($this->tabActivites[$j]->getNumActivite() != $unNumActivite && $j < count($this->tabActivites)){
            $i++;
        }
        if ($j < count($this->tabActivites)){
            unset($this->tabActivites[$j]);
        }
        else{
            echo("Le numéro saisi n'existe pas !");
        }
    }
    }
    
    public function getNumAnimation():int{
        return $this->numAnimation;
    }
    
     public function getLibelleAnimation():string{
        return $this->libelleAnimation;
    }
    
     public function getTheme(): string{
        return $this->theme;
    }
    
     public function getPresentation():string{
        return $this->presentation;
    }
    
     public function getDateDebut(){
        return $this->dateDebut;
    }
    
     public function getDateFin(){
        return $this->dateFin;
    }
    
    public function getPhotoAnimation(){
        return $this->cheminPhoto;
    }
    
     public function getTabEnfants(){
         for($i=0; $i<count($this->tabEnfants); $i++){
            print("<b>".$this->tabEnfants[$i]->getNom()."   ".$this->tabEnfants[$i]->getPrenom()."</b>"."   ".
                  "<i>".$this->tabEnfants[$i]->getAge()."  ans"."</i>"."<br/><br/>");
          
        }
    }
    
     public function getTabAnimateurs(){
        for($i=0; $i<count($this->tabAnimateurs); $i++){
          print("<b>".$this->tabAnimateurs[$i]->getNom()."  ".$this->tabAnimateurs[$i]->getPrenom()."</b><br/>".
                "Adresse: "."<i>".$this->tabAnimateurs[$i]->getAdresse()."</i>"."<br/>".
                "Téléphone: "."<i>".$this->tabAnimateurs[$i]->getTelephone()."</i>"."<br/><br/>");
        }
    }
    
    public function getTabActivites(){
        return $this->tabActivites;
    }
    
     public function afficheNomActivite($i){
         return $this->tabActivites[$i]->getDesignationActivite();
 
    }
    
    public function affichePhotoActivite($i){
        return $this->tabActivites[$i]->getPhotoActivite();
    }
    
    public function getNumeroActivite($i){
        return $this->tabActivites[$i]->getNumActivite();
    }
    
 
    
    
}