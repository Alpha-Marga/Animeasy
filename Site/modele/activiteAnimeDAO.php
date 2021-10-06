<?php

include_once('connexionDAO.php');

class activiteAnimeDAO{
    
// FONCTION POUR CHARGER LES ANIMATEURS CHARGER D'ANIMER UNE ACTIVITE
    
        public static function chargerAnimateurActivite(int $numActivite): array
        {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select animateur.NUM_PERSONNE, NOM, PRENOM, ADRESSE, CP, VILLE, TELEPHONE
                                          from animateur, animer
                                          where animateur.NUM_PERSONNE = animer.NUM_PERSONNE
                                          and NUM_ACTIVITE = :NUM_ACTIVITE");
        
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetchAll();
        foreach ($ligne as $key => $val) {
            $animateur = new animateur($val['NUM_PERSONNE'], $val['NOM'], $val['PRENOM'], $val['ADRESSE'], $val['CP'], $val['VILLE'], $val['TELEPHONE']);
            $resultat[]= $animateur;
            
        }
        return $resultat;
     }
     
// FONCTION POUR AFFICHER LES ACTIVITES ANIMES
     
      public static function chargerLesActivitesAnimes(): array
    {
        $resultat = array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from animer");
        $req->execute();
        $ligne = $req->fetchAll();
        foreach ($ligne as $key => $val) {
            $animer = new activiteAnime(activiteDAO::chargerActivite($val['NUM_ACTIVITE']), activiteAnimeDAO::chargerAnimateurActivite($val['NUM_ACTIVITE']), $val['UNEDATE'], $val['DEBUT_ACTIVITE'], $val['FIN_ACTIVITE']);
            $resultat[] = $animer;
        }
        return $resultat;
    }
    
    
// FONCTION POUR AFFICHER UNE ACTIVITE ANIME
    
     public static function chargerUneActiviteAnime(int $numActivite)
    {
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from animer where NUM_ACTIVITE = :NUM_ACTIVITE");
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);

        $animer = new activiteAnime(activiteDAO::chargerActivite($ligne['NUM_ACTIVITE']), activiteAnimeDAO::chargerAnimateurActivite($ligne['NUM_ACTIVITE']), $ligne['UNEDATE'], $ligne['DEBUT_ACTIVITE'], $ligne['FIN_ACTIVITE']);
        return $animer;
    }
    

// FONCTION POUR AFFICHER L'ACTIVITE DU JOUR
    
    public static function chargerActiviteJour()
    {
        $resultat =array();
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("select* from animer where UNEDATE = DATE(NOW())");
        $req->execute();
        $ligne = $req->fetchAll();
        foreach ($ligne as $key => $val) {
            $animer = new activiteAnime(activiteDAO::chargerActivite($val['NUM_ACTIVITE']), activiteAnimeDAO::chargerAnimateurActivite($val['NUM_ACTIVITE']), $val['UNEDATE'], $val['DEBUT_ACTIVITE'], $val['FIN_ACTIVITE']);
            $resultat[] = $animer;
        }
        return $resultat;
    }
    
// FONCTION POUR AJOUTER UNE ACTIVITE ANIME
    
      public static function ajoutActiviteAnime(int $numAnimateur, int $numActivite, string $laDate, string $debut, string $fin){

        $resultat = -1;               
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("insert into animer (NUM_PERSONNE, NUM_ACTIVITE, UNEDATE, DEBUT_ACTIVITE, FIN_ACTIVITE) values(:NUM_PERSONNE, :NUM_ACTIVITE, :UNEDATE, :DEBUT_ACTIVITE, :FIN_ACTIVITE)");
        $req->bindValue(':NUM_PERSONNE', $numAnimateur, PDO::PARAM_INT);
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->bindValue(':UNEDATE', $laDate, PDO::PARAM_STR);
        $req->bindValue(':DEBUT_ACTIVITE', $debut, PDO::PARAM_STR);
        $req->bindValue(':FIN_ACTIVITE', $fin, PDO::PARAM_STR);
        
        $req->execute();
        
        return $resultat;

    }
    
// FONCTION POUR METTRE A JOUR LA DATE D'UNE ACTIVITE ANIME
    
    public static function updateActiviteAnime( int $numActivite, string $laDate, string $dateNew){
       
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("update animer set UNEDATE= :UNEDATENEW where NUM_ACTIVITE = :NUM_ACTIVITE and UNEDATE= :UNEDATE;");
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
        $req->bindValue(':UNEDATE', $laDate, PDO::PARAM_STR);
        $req->bindValue(':UNEDATENEW', $dateNew, PDO::PARAM_STR);
        
        $req->execute();
        return 1;
        
    }
     
    
    public static function suppActiviteAnime( int $numActivite, string $uneDate) {    
      
        $maConnexion = connexionDAO::createConnexion();
        $cnx = connexionDAO::$connexion;
        $req = $cnx->prepare("delete from animer where NUM_ACTIVITE = :NUM_ACTIVITE and UNEDATE = :UNEDATE");
        $req->bindValue(':UNEDATE', $uneDate, PDO::PARAM_STR);
        $req->bindValue(':NUM_ACTIVITE', $numActivite, PDO::PARAM_INT);
     
        return 1;
        
        
    }
       

}




