<?php

include_once('connexionDAO.php');

class activiteDAO{
    
// FONCTION POUR CHARGER LES ENFANTS APTENT A PRATIQUER UNE ACTIVITE   
    
    public static function chargerEnfantsAptes(int $numActivite){
          $resultat = array();
          $maConnexion = connexionDAO::createConnexion();
          $cnx = connexionDAO::$connexion;
          $req = $cnx->prepare("select enfant.NUM_PERSONNE, NOM, PRENOM, AGE
                     from enfant, apte_enfant
                     where enfant.NUM_PERSONNE = apte_enfant.NUM_PERSONNE
                     and NUM_ACTIVITE = :NUM_ACTIVITE");
          $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
          $req->execute();
         
          $ligne = $req->fetchAll();
          foreach ($ligne as $key => $val) {
              $enfantApte = new enfant($val['NUM_PERSONNE'], $val['NOM'], $val['PRENOM'], $val['AGE']);
              $resultat[]=$enfantApte;
         }
         return $resultat;
    }
    
// FONCTION POUR AJOUTER UN ENFANT APTE A PRATIQUER UNE ACTIVITE 
    
    public static function ajoutEnfantApteDAO(int $numEnfant, int $numActivite){
        $lesEnfants = activiteDAO::chargerEnfantsAptes($numActivite);
        $tab = array();
        for($i=0; $i<count($lesEnfants); $i++){
            $tab[]=$lesEnfants[$i]->getNumPersonne();
        }
        if(!in_array($numEnfant, $tab)){
      
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into apte_enfant (NUM_PERSONNE, NUM_ACTIVITE) values(:NUM_PERSONNE,:NUM_ACTIVITE)");
        $req->bindValue(':NUM_PERSONNE', $numEnfant, PDO::PARAM_INT);
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
        
    }

// FONCTION POUR SUPPRIMER UN ENFANT QUI N'EST PLUS APTE A PRATIQUER UNE ACTIVITE 
    
      public static function suppEnfantApteDAO(int $numEnfant, int $numActivite) {
        $lesEnfants = activiteDAO::chargerEnfantsAptes($numActivite);
        $tab = array();
        for($i=0; $i<count($lesEnfants); $i++){
            $tab[]=$lesEnfants[$i]->getNumPersonne();
        }
        if(in_array($numEnfant, $tab)){
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from apte_enfant where NUM_PERSONNE = :NUM_PERSONNE and NUM_ACTIVITE = :NUM_ACTIVITE");
        $req->bindValue(':NUM_PERSONNE', $numEnfant, PDO::PARAM_INT);
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
     
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
    }

// FONCTION POUR AFFICHER LES ACTIVITES
    
    public static function chargerLesActvites(): array
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from activite");
        $req->execute();
        $ligne = $req->fetchAll();
        if($ligne){
        foreach ($ligne as $key => $val) {
            $Activite = new activite($val['NUM_ACTIVITE'], $val['LIBELLE_CATEGORIE'], $val['DESIGNATION'], $val['DESCRIPTION'], $val['NBMIN_PARTICIPANT'], $val['NBMAX_PARTICIPANT'], $val['PHOTO_ACTIVITE'], activiteDAO::chargerEnfantsAptes($val['NUM_ACTIVITE']));
            $resultat[]=$Activite;
        }
        }
        return $resultat;
    }
    
// FONCTION POUR AFFICHER UNE ACTIVITE 
    
    public static function chargerActivite(int $numActivite){
       $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from activite where NUM_ACTIVITE = :NUM_ACTIVITE");
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne){
        $uneActivite = new activite($ligne['NUM_ACTIVITE'], $ligne['LIBELLE_CATEGORIE'], $ligne['DESIGNATION'], $ligne['DESCRIPTION'], $ligne['NBMIN_PARTICIPANT'], $ligne['NBMAX_PARTICIPANT'], $ligne['PHOTO_ACTIVITE'], activiteDAO::chargerEnfantsAptes($ligne['NUM_ACTIVITE']));
        
        return $uneActivite;
        }
      
    }
    
// FONCTION POUR AJOUTER UNE ACTIVITE   
    
    public static function ajoutActiviteDAO($numero, $libelleCat, $designation, $description, $nbMin, $nbMax, $photo){
        $lesActivites = activiteDAO::chargerLesActvites();
        $tab = array();
        for($i=0; $i<count($lesActivites); $i++){
            $tab[]=$lesActivites[$i]->getNumActivite();
        }
        if(!in_array($numero, $tab)){
       
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into activite (NUM_ACTIVITE, LIBELLE_CATEGORIE, DESIGNATION, DESCRIPTION, NBMIN_PARTICIPANT, NBMAX_PARTICIPANT, PHOTO_ACTIVITE) values(:NUM_ACTIVITE,:LIBELLE_CATEGORIE, :DESIGNATION, :DESCRIPTION, :NBMIN_PARTICIPANT, :NBMAX_PARTICIPANT, :PHOTO_ACTIVITE)");
        $req->bindValue(':NUM_ACTIVITE', $numero, PDO::PARAM_INT);
        $req->bindValue(':LIBELLE_CATEGORIE', $libelleCat, PDO::PARAM_STR);
        $req->bindValue(':DESIGNATION', $designation, PDO::PARAM_STR);
        $req->bindValue(':DESCRIPTION', $description, PDO::PARAM_STR);
        $req->bindValue(':NBMIN_PARTICIPANT', $nbMin, PDO::PARAM_INT);
        $req->bindValue(':NBMAX_PARTICIPANT', $nbMax, PDO::PARAM_INT);
        $req->bindValue(':NBMAX_PARTICIPANT', $nbMax, PDO::PARAM_INT);
        $req->bindValue(':PHOTO_ACTIVITE', $photo, PDO::PARAM_STR);
        
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
    }

//FONCTION POUR SUPPRIMER UNE ACTIVITE
    
    public static function suppActiviteDAO(int $numActivite) {
        $lesActivites = activiteDAO::chargerLesActvites();
        $tab = array();
        for($i=0; $i<count($lesActivites); $i++){
            $tab[]=$lesActivites[$i]->getNumActivite();
        }
        if(in_array($numActivite, $tab)){
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from activite where NUM_ACTIVITE = :NUM_ACTIVITE");
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
     
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
    }
    

}




