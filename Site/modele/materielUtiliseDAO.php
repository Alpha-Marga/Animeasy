<?php

include_once('connexionDAO.php');

class materielUtiliseDAO{
    
// FONCTION POUR CHARGER LES MATERIELS UTILISES LORS D'UNE ACTIVITE
    
    public static function chargerMaterielsUtilises(int $numActivite): array
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from utiliser_materiel where NUM_ACTIVITE = :NUM_ACTIVITE");
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetchAll();
        if($ligne != ""){
        foreach ($ligne as $key => $val) {
            $materielUtilise = new MaterielUtilise(activiteDAO::chargerActivite($val['NUM_ACTIVITE']), materielDAO::chargerUnMateriel($val['CODE_MATERIEL']), $val['QTE_MATERIEL']);
            $resultat[] = $materielUtilise;
        }
        return $resultat;
        }
    }
    
// FONCTION POUR CHARGER LES MATERIELS UTILISES LORS DE L'ACTIVITE DU JOUR 
    
    public static function chargerMaterielsJour()
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select CODE_MATERIEL, utiliser_materiel.NUM_ACTIVITE, QTE_MATERIEL from utiliser_materiel, activite, animer where activite.NUM_ACTIVITE = utiliser_materiel.NUM_ACTIVITE and activite.NUM_ACTIVITE = animer.NUM_ACTIVITE and UNEDATE = DATE(NOW())");
        $req->execute();
        $ligne = $req->fetchAll();
        foreach ($ligne as $key => $val) {
            $materielUtilise = new MaterielUtilise(activiteDAO::chargerActivite($val['NUM_ACTIVITE']), materielDAO::chargerUnMateriel($val['CODE_MATERIEL']), $val['QTE_MATERIEL']);
            $resultat[] = $materielUtilise;
        }
        return $resultat;
    }

// FONCTION POUR AJOUTER UN MATERIEL UTILISE DANS UNE ACTIVITE
    
    public static function ajoutMaterielUtilise(string $code, int $numActivite, int $qte){
        $lesMateriels = materielDAO::chargerLesMateriels();
        $table = array();
        for($i=0; $i<count($lesMateriels); $i++){
            $table[]=$lesMateriels[$i]->getCodeMateriel();
        }
        $lesMaterielsUtilises = materielUtiliseDAO::chargerMaterielsUtilises($numActivite);
        $tab = array();
        for($i=0; $i<count($lesMaterielsUtilises); $i++){
            $tab[]=$lesMaterielsUtilises[$i]->getMaterielUtilise()->getCodeMateriel();
        }
        if(!in_array($code, $tab) && in_array($code, $table)){
  
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into utiliser_materiel (CODE_MATERIEL, NUM_ACTIVITE, QTE_MATERIEL) values(UPPER(:CODE_MATERIEL),:NUM_ACTIVITE, :QTE_MATERIEL)");
        $req->bindValue(':CODE_MATERIEL', $code, PDO::PARAM_STR);
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->bindValue(':QTE_MATERIEL', $qte, PDO::PARAM_INT);
        
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }

        }
    
//FONCTION POUR SUPPRIMER UN MATERIEL UTILISE DANS UNE ACTIVITE 
        
    public static function suppMaterielUtilise(string $code, int $numActivite) {
        $lesMateriels = materielUtiliseDAO::chargerMaterielsUtilises($numActivite);
        $tab = array();
        for($i=0; $i<count($lesMateriels); $i++){
            $tab[]=$lesMateriels[$i]->getMaterielUtilise()->getCodeMateriel();
        }
        if(in_array($code, $tab)){
  
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from utiliser_materiel where CODE_MATERIEL = :CODE_MATERIEL and NUM_ACTIVITE = :NUM_ACTIVITE");
        $req->bindValue(':CODE_MATERIEL', $code, PDO::PARAM_STR);
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }

        }
        
// FONCTION POUR METTRE A JOUR LA QUANTITE DE MATERIELS

 public static function updateQuantiteMateriel(int $numActivite, string $code, int $qte ){
     
        $resultat=-1;
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("update utiliser_materiel set QTE_MATERIEL= :QTE_MATERIEL where NUM_ACTIVITE = :NUM_ACTIVITE and CODE_MATERIEL = :CODE_MATERIEL ");
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->bindValue(':CODE_MATERIEL', $code, PDO::PARAM_INT);
        $req->bindValue(':QTE_MATERIEL', $qte, PDO::PARAM_INT);
    
        $req->execute();
        return $resultat;
        
    }
        

    
    
    

}
