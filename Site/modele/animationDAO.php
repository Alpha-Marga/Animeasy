<?php

include_once('connexionDAO.php');

class animationDAO{

//FONCTION POUR CHARGER LES ENFANTS QUI PARTICIPENT A UNE ANIMATION
    
    public static function participerEnfantDAO(int $numAnimation){
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select enfant.NUM_PERSONNE, NOM, PRENOM, AGE
                                          from enfant, participer_enfant
                                          where enfant.NUM_PERSONNE = participer_enfant.NUM_PERSONNE_ENFANT
                                          and NUM_ANIMATION = :NUM_ANIMATION");
        
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
        $req->execute();
        
        $ligne = $req->fetchAll();
        if($ligne != ""){
        foreach ($ligne as $key => $val) {
            $enfantParticipant = new enfant($val['NUM_PERSONNE'], $val['NOM'], $val['PRENOM'], $val['AGE']);
            $resultat[] = $enfantParticipant;
        }
        return $resultat;
        }
        
    }
    
//FONCTION POUR AJOUTER UN ENFANT QUI PARTICIPENT A UNE ANIMATION
    
    public static function ajoutParticiperEnfant(int $numEnfant, int $numAnimation){
        $lesEnfants = animationDAO::participerEnfantDAO($numAnimation);
        $tab = array();
        for($i=0; $i<count($lesEnfants); $i++){
            $tab[]=$lesEnfants[$i]->getNumPersonne();
        }
        if(!in_array($numEnfant, $tab)){

        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into participer_enfant (NUM_ANIMATION, NUM_PERSONNE_ENFANT) values(:NUM_ANIMATION,:NUM_PERSONNE_ENFANT)");
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
        $req->bindValue(':NUM_PERSONNE_ENFANT', $numEnfant, PDO::PARAM_INT);
        
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
        
    }
    
//FONCTION POUR SUPPRIMER UN ENFANT  D'UNE ANIMATION
    
    public static function suppParticiperEnfant(int $numEnfant, int $numAnimation) {
        $lesEnfants = animationDAO::participerEnfantDAO($numAnimation);
        $table = array();
        for($i=0; $i<count($lesEnfants); $i++){
            $tab[]=$lesEnfants[$i]->getNumPersonne();
        }
        if(in_array($numEnfant, $tab)){

        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from participer_enfant where NUM_PERSONNE_ENFANT = :NUM_PERSONNE_ENFANT and NUM_ANIMATION = :NUM_ANIMATION");
        $req->bindValue(':NUM_PERSONNE_ENFANT', $numEnfant, PDO::PARAM_INT);
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
     
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
    }
    
//FONCTION POUR CHARGER LES ANIMATEURS CHARGES DU DEROULEMENT D'UNE ANIMATION
    
    public static function participerAnimateurDAO(int $numAnimation): array
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select animateur.NUM_PERSONNE, NOM, PRENOM, ADRESSE, CP, VILLE, TELEPHONE
                                          from animateur, participer_animateur
                                          where animateur.NUM_PERSONNE = participer_animateur.NUM_PERSONNE_ANIMATEUR
                                          and NUM_ANIMATION = :NUM_ANIMATION");
        
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetchAll();
        if($ligne != ""){
        foreach ($ligne as $key => $val) {
            $animateurParticipant = new animateur($val['NUM_PERSONNE'], $val['NOM'], $val['PRENOM'], $val['ADRESSE'], $val['CP'], $val['VILLE'], $val['TELEPHONE']);
            $resultat[]= $animateurParticipant;
            
        }
        return $resultat;
    }
    }
    
// FONCTION POUR AJOUTER UN ANIMATEUR DANS UNE ANIMATION
    
    public static function ajoutParticiperAnimateur(int $numAnimateur, int $numAnimation){
        $lesAnimateurs = animationDAO::participerAnimateurDAO($numAnimation);
        $tab = array();
        for($i=0; $i<count($lesAnimateurs); $i++){
            $tab[]=$lesAnimateurs[$i]->getNumPersonne();
        }
        if(!in_array($numAnimateur, $tab)){
    
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into participer_animateur (NUM_ANIMATION, NUM_PERSONNE_ANIMATEUR) values(:NUM_ANIMATION,:NUM_PERSONNE_ANIMATEUR)");
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
        $req->bindValue(':NUM_PERSONNE_ANIMATEUR', $numAnimateur, PDO::PARAM_INT);
        
         $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
    }
 
// FONCTION POUR SUPPRIMER UN ANIMATEUR D'UNE ANIMATION
    
    public static function suppParticiperAnimateur(int $numAnimateur, int $numAnimation) {
        $lesAnimateurs = animationDAO::participerAnimateurDAO($numAnimation);
        $tab = array();
        for($i=0; $i<count($lesAnimateurs); $i++){
            $tab[]=$lesAnimateurs[$i]->getNumPersonne();
        }
        if(in_array($numAnimateur, $tab)){
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from participer_animateur where NUM_PERSONNE_ANIMATEUR = :NUM_PERSONNE_ANIMATEUR and NUM_ANIMATION = :NUM_ANIMATION");
        $req->bindValue(':NUM_PERSONNE_ANIMATEUR', $numAnimateur, PDO::PARAM_INT);
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
     
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
    }
 
// FONCTION POUR CHARGER LES ACTIVITES D'UNE ANIMATION
    
    public static function chargerActiviteAnimation(int $numAnimation): array
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select activite.NUM_ACTIVITE, LIBELLE_CATEGORIE, DESIGNATION, DESCRIPTION, NBMIN_PARTICIPANT, NBMAX_PARTICIPANT, PHOTO_ACTIVITE
                                          from activite, contenir_activite
                                          where activite.NUM_ACTIVITE = contenir_activite.NUM_ACTIVITE
                                          and NUM_ANIMATION = :NUM_ANIMATION");
        
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetchAll();
        if($ligne != "")
        foreach ($ligne as $key => $val) {
            $lesActivites = new activite($val['NUM_ACTIVITE'], $val['LIBELLE_CATEGORIE'], $val['DESIGNATION'], $val['DESCRIPTION'], $val['NBMIN_PARTICIPANT'], $val['NBMAX_PARTICIPANT'], $val['PHOTO_ACTIVITE'], activiteDAO::chargerEnfantsAptes($val['NUM_ACTIVITE']));
            $resultat[] = $lesActivites;
            
        }
        return $resultat;
    }
 
 // FONCTION POUR AJOUTER UNE ACTIVITE DANS UNE ANIMATION
    
    public static function ajoutActiviteAnimation(int $numAnimation, int $numActivite){
        $lesActivites = animationDAO::chargerActiviteAnimation($numAnimation);
        $tab = array();
        for($i=0; $i<count($lesActivites); $i++){
            $tab[]=$lesActivites[$i]->getNumActivite();
        }
        if(!in_array($numActivite, $tab)){
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into contenir_activite (NUM_ANIMATION, NUM_ACTIVITE) values(:NUM_ANIMATION,:NUM_ACTIVITE)");
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
        
    }
    
 // FONCTION POUR SUPPRIMER UNE ACTIVITE D'UNE ANIMATION
    
    public static function suppActiviteAnimation(int $numAnimation, int $numActivite) {
        $lesActivites = animationDAO::chargerActiviteAnimation($numAnimation);
        $tab = array();
        for($i=0; $i<count($lesActivites); $i++){
            $tab[]=$lesActivites[$i]->getNumActivite();
        }
        if(in_array($numActivite, $tab)){ 
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from contenir_activite where NUM_ACTIVITE = :NUM_ACTIVITE and NUM_ANIMATION = :NUM_ANIMATION");
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
     
        $req->execute();
        
            return 1;
        }
        else {
            return 0;
        }
        
    }
    
// FONCTION POUR AFFICHER LES ANIMATIONS
    
    public static function chargerLesAnimations(): array
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from animation");
        $req->execute();
        $ligne = $req->fetchAll();
        foreach ($ligne as $key => $val) {
            $animation = new animation($val['NUM_ANIMATION'], $val['LIBELLE_ANIMATION'], $val['THEME'], $val['PRESENTATION'], $val['DATE_DEBUT'], $val['DATE_FIN'], $val['PHOTO_ANIMATION'], animationDAO::participerEnfantDAO($val['NUM_ANIMATION']), animationDAO::participerAnimateurDAO($val['NUM_ANIMATION']), animationDAO::chargerActiviteAnimation($val['NUM_ANIMATION']));
            $resultat[] = $animation;
        }
        return $resultat;
    }
    
    
    
// FONCTION POUR AFFICHER UNE ANIMATION
    
    public static function chargerUneAnimation(int $numAnimation){
           $maConnexion = connexionDAO::createConnexion();
           $cnx = connexionDAO::$connexion;
            $req = $cnx->prepare("select* from animation where NUM_ANIMATION = :NUM_ANIMATION");
           $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
           $req->execute();
           $ligne = $req->fetch(PDO::FETCH_ASSOC);
           
           $uneAnimation = new animation($ligne['NUM_ANIMATION'], $ligne['LIBELLE_ANIMATION'], $ligne['THEME'], $ligne['PRESENTATION'], $ligne['DATE_DEBUT'], $ligne['DATE_FIN'], $ligne['PHOTO_ANIMATION'],animationDAO::participerEnfantDAO($ligne['NUM_ANIMATION']), animationDAO::participerAnimateurDAO($ligne['NUM_ANIMATION']), animationDAO::chargerActiviteAnimation($ligne['NUM_ANIMATION']));
           
           return $uneAnimation;
      
   }

 // FONCTION POUR AJOUTER UNE ANIMATION
   
   public static function ajoutAnimationDAO($numero, $libelle, $theme, $presentation, $dateDebut, $dateFin, $cheminP){
        $lesAnimations = animationDAO::chargerLesAnimations();
        $tab = array();
        for($i=0; $i<count($lesAnimations); $i++){
            $tab[]=$lesAnimations[$i]->getNumAnimation();
        }
        if(!in_array($numero, $tab)){

        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into animation (NUM_ANIMATION, LIBELLE_ANIMATION, THEME, PRESENTATION, DATE_DEBUT, DATE_FIN, PHOTO_ANIMATION) values(:NUM_ANIMATION, :LIBELLE_ANIMATION, :THEME, :PRESENTATION, :DATE_DEBUT, :DATE_FIN, :PHOTO_ANIMATION)");
        $req->bindValue(':NUM_ANIMATION', $numero, PDO::PARAM_INT);
        $req->bindValue(':LIBELLE_ANIMATION', $libelle, PDO::PARAM_STR);
        $req->bindValue(':THEME', $theme, PDO::PARAM_STR);
        $req->bindValue(':PRESENTATION', $presentation, PDO::PARAM_STR);
        $req->bindValue(':DATE_DEBUT', $dateDebut, PDO::PARAM_STR);
        $req->bindValue(':DATE_FIN', $dateFin, PDO::PARAM_STR);
        $req->bindValue(':PHOTO_ANIMATION', $cheminP, PDO::PARAM_STR);
        
        $req->execute();
        
         return 1;
        }
        else {
          return 0;
       }
    }
 
// FONCTION POUR METTRE A JOUR LA PERIODE D'UNE ANIMATION
    
    public static function updateAnimation($numAnimation, $dateDebut, $dateFin){
        $lesAnimations = animationDAO::chargerLesAnimations();
        $tab = array();
        
        for($i=0; $i<count($lesAnimations); $i++){
            $tab[]= $lesAnimations[$i]->getDateDebut();
        }
        if(!in_array($dateDebut, $tab)){
       
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("update animation set DATE_DEBUT= :DATE_DEBUT, DATE_FIN= :DATE_FIN where NUM_ANIMATION = :NUM_ANIMATION");
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
        $req->bindValue(':DATE_DEBUT', $dateDebut, PDO::PARAM_STR);
        $req->bindValue(':DATE_FIN', $dateFin, PDO::PARAM_STR);
        
        $req->execute();
        return 1;
        }
        else{
            return 0;
        }
        
    }
    
// FONCTION POUR SUPPRIMER UNE ANIMATION

     public static function suppAnimationDAO($numAnimation) {
        $lesAnimations = animationDAO::chargerLesAnimations();
        $tabl = array();
        for($i=0; $i<count($lesAnimations); $i++){
            $tabl[]=$lesAnimations[$i]->getNumAnimation();
        }
        if(in_array($numAnimation, $tabl)){
        
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from animation where NUM_ANIMATION = :NUM_ANIMATION");
        $req->bindValue(':NUM_ANIMATION', $numAnimation, PDO::PARAM_INT);
     
        $req->execute();
  
            return 1;
        }
        else {
            return 0;
        }
    }


}
