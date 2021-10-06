<?php

include_once('connexionDAO.php');

class enfantDAO{

//FONCTION POUR AFFICHER LES ENFANTS
    
    public static function chargerLesEnfants()
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from enfant");
        $req->execute();
        $ligne = $req->fetchAll();
        foreach ($ligne as $key => $val) {
            $collectionEnfant = new enfant($val['NUM_PERSONNE'], $val['NOM'], $val['PRENOM'], $val['AGE']);
            $resultat[]=$collectionEnfant;
        }
     
        return $resultat;
    }

//FONCTION POUR AFFICHER UN ENFANT
    
    public static function chargerUnEnfant($numEnfant){
       
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from enfant where NUM_PERSONNE = :NUM_PERSONNE");
        $req->bindValue(':NUM_PERSONNE', $numEnfant, PDO::PARAM_INT);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unEnfant = new enfant($ligne['NUM_PERSONNE'], $ligne['NOM'], $ligne['PRENOM'], $ligne['AGE']);
            return $unEnfant;
        }
    }

//FONCTION POUR AJOUTER UN ENFANT DANS LA BASE DE DONNES    
    
    public static function ajoutEnfantDAO($numero, $nom, $prenom, $age) {
        $lesEnfants = enfantDAO::chargerLesEnfants();
        $tab = array();
        for($i=0; $i<count($lesEnfants); $i++){
            $tab[]=$lesEnfants[$i]->getNumPersonne();
        }
        if(!in_array($numero, $tab)){
   
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into enfant (NUM_PERSONNE, NOM, PRENOM, AGE) values(:NUM_PERSONNE,:NOM, :PRENOM, :AGE)");
        $req->bindValue(':NUM_PERSONNE', $numero, PDO::PARAM_INT);
        $req->bindValue(':NOM', $nom, PDO::PARAM_STR);
        $req->bindValue(':PRENOM', $prenom, PDO::PARAM_STR);
        $req->bindValue(':AGE', $age, PDO::PARAM_INT);
        
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
    }

//FONCTION POUR SUPPRIMER UN ENFANT DE LA BASE DONNEES
    
    public static function suppEnfantDAO($numero) {
        $lesEnfants = enfantDAO::chargerLesEnfants();
        $tab = array();
        for($i=0; $i<count($lesEnfants); $i++){
            $tab[]=$lesEnfants[$i]->getNumPersonne();
        }
        if(in_array($numero, $tab)){
   
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from enfant where NUM_PERSONNE = :NUM_PERSONNE");
        $req->bindValue(':NUM_PERSONNE', $numero, PDO::PARAM_INT);
     
         $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
}

// FONCTION POUR METTRE A JOUR L'AGE D'UN ENFANT

 public static function updateAgeEnfant(int $numero, int $age){
     
        $resultat=-1;
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("update enfant set AGE= :AGE where NUM_ENFANT = :NUM_ENFANT ");
        $req->bindValue(':NUM_ENFANT', $numero, PDO::PARAM_INT);
        $req->bindValue(':AGE', $age, PDO::PARAM_INT);
    
        $req->execute();
        return $resultat;
        
    }
    

}

