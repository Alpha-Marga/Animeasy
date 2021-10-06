<?php

include_once('connexionDAO.php');

class materielDAO{
  
    public static function chargerLesMateriels()
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from materiel");
        $req->execute();
        $ligne = $req->fetchAll();
        foreach ($ligne as $key => $val) {
            $materiel = new materiel($val['CODE_MATERIEL'], $val['LIBELLE_MATERIEL']);
            $resultat[]=$materiel;
        }
        return $resultat;
    }
    
    public static function chargerUnMateriel($codeMateriel){

        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from materiel where CODE_MATERIEL = :CODE_MATERIEL");
        $req->bindValue(':CODE_MATERIEL', $codeMateriel, PDO::PARAM_STR);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne){
            $unEnfant = new materiel($ligne['CODE_MATERIEL'], $ligne['LIBELLE_MATERIEL']);
            return $unEnfant;
        }
    }
    
    
    public static function ajoutMaterielDAO(string $code, string $libelle) {
        $lesMateriels = materielDAO::chargerLesMateriels();
        $tab = array();
        for($i=0; $i<count($lesMateriels); $i++){
            $tab[]=$lesMateriels[$i]->getCodeMateriel();
        }
        if(!in_array($code, $tab)){
  
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into materiel (CODE_MATERIEL, LIBELLE_MATERIEL) values(:CODE_MATERIEL,:LIBELLE_MATERIEL)");
        $req->bindValue(':CODE_MATERIEL', $code, PDO::PARAM_STR);
        $req->bindValue(':LIBELLE_MATERIEL', $libelle, PDO::PARAM_STR);
        
        $req->execute();
        return 1;
        }
        else{
            return 0;
        }
    }
    
     public static function suppMaterielDAO(string $code) {
        $lesMateriels = materielDAO::chargerLesMateriels();
        $tab = array();
        for($i=0; $i<count($lesMateriels); $i++){
            $tab[]=$lesMateriels[$i]->getCodeMateriel();
        }
        if(in_array($code, $tab)){
  
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from materiel where CODE_MATERIEL = :CODE_MATERIEL");
        $req->bindValue(':CODE_MATERIEL', $code, PDO::PARAM_STR);
        
        $req->execute();
        return 1;
        }
        else{
            return 0;
        }
    }

}