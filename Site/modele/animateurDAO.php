<?php

include_once('connexionDAO.php');

class animateurDAO{
  
// FONCTION POUR AFFICHER LES ANIMATEURS
    
    public static function chargerLesAnimateurs(): array
    {
        $resultat= array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from animateur");
        $req->execute();
        $ligne = $req->fetchAll();
        foreach ($ligne as $key => $val) {
            $collectionAnimateur = new animateur($val['NUM_PERSONNE'], $val['NOM'], $val['PRENOM'], $val['ADRESSE'], $val['CP'], $val['VILLE'], $val['TELEPHONE']);
            $resultat[]=$collectionAnimateur;
        }
        return $resultat;
    }
    
// FONCTION POUR AFFICHER UN ANIMATEUR
    
    public static function chargerUnAnimateur(int $numAnimateur){
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from animateur where NUM_PERSONNE = :NUM_PERSONNE");
        $req->bindValue(':NUM_PERSONNE', $numAnimateur, PDO::PARAM_INT);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne){
        $unAnimateur = new animateur($ligne['NUM_PERSONNE'], $ligne['NOM'], $ligne['PRENOM'], $ligne['ADRESSE'], $ligne['CP'], $ligne['VILLE'], $ligne['TELEPHONE']);
        return $unAnimateur;
        }
    }
    
 
// FONCTION POUR AJOUTER UN ANIMATEUR
    
    public static function ajoutAnimateurDAO(int $numero, string $nom, string $prenom, string $adresse, int $cp, string $ville, string $telephone){
        $lesAnimateurs= animateurDAO::chargerLesAnimateurs();
        $tab = array();
        for($i=0; $i<count($lesAnimateurs); $i++){
           $tab[]=$lesAnimateurs[$i]->getNumPersonne();}
        if(!in_array($numero, $tab)){
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into animateur (NUM_PERSONNE, NOM, PRENOM, ADRESSE, CP, VILLE, TELEPHONE) values(:NUM_PERSONNE,:NOM, :PRENOM, :ADRESSE, :CP, :VILLE, :TELEPHONE)");
        $req->bindValue(':NUM_PERSONNE', $numero, PDO::PARAM_INT);
        $req->bindValue(':NOM', $nom, PDO::PARAM_STR);
        $req->bindValue(':PRENOM', $prenom, PDO::PARAM_STR);
        $req->bindValue(':ADRESSE', $adresse, PDO::PARAM_STR);   
        $req->bindValue(':CP', $cp, PDO::PARAM_INT);
        $req->bindValue(':VILLE', $ville, PDO::PARAM_STR);   
        $req->bindValue(':TELEPHONE', $telephone, PDO::PARAM_STR);
        
         $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
    }

// FONCTION POUR SUPPRIMER UN ANIMATEUR
    
    public static function suppAnimateurDAO(int $numAnimateur) {
        $lesAnimateurs= animateurDAO::chargerLesAnimateurs();
        $tab = array();
        for($i=0; $i<count($lesAnimateurs); $i++){
            $tab[]=$lesAnimateurs[$i]->getNumPersonne();
        }
        if(in_array($numAnimateur, $tab)){
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from animateur where NUM_PERSONNE = :NUM_PERSONNE");
        $req->bindValue(':NUM_PERSONNE', $numAnimateur, PDO::PARAM_INT);
     
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
}

// FONCTION POUR METTRE A JOUR L'ADRESSE D'UN ANIMATEUR

 public static function updateAdresseAnimateur(int $numero, string $adresse, int $cp, string $ville){
     
        $resultat=-1;
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("update animateur set ADRESSE= :ADRESSE, CP= :CP, VILLE= :VILLE where NUM_ANIMATEUR = :NUM_ANIMATEUR ");
        $req->bindValue(':NUM_ANIMATEUR', $numero, PDO::PARAM_INT);
        $req->bindValue(':ADRESSE', $adresse, PDO::PARAM_STR);
        $req->bindValue(':CP', $cp, PDO::PARAM_INT);
        $req->bindValue(':VILLE', $ville, PDO::PARAM_STR);
    
        $req->execute();
        return $resultat;
        
    }
    

}



