<?php


class connexionDAO
{
     static private $login = "root";
     static private $mdp = "root";
     static private $bd = "animeasy";
     static private $serveur = "localhost";
     static public $connexion;
     static private $connexionAnimeasy=NULL;
             
     public function __construct(){
   
    try {
        connexionDAO::$connexion = new PDO("mysql:host=".connexionDAO::$serveur.";dbname=".connexionDAO::$bd, connexionDAO::$login, connexionDAO::$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        connexionDAO::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print($e->getMessage());
        print "Erreur de connexion PDO1 ";
        die();
    }

     }
     
     static public function getConnexion(){
         return connexionDAO::$connexion;
     }
     static public function createConnexion(){
         if(connexionDAO::$connexionAnimeasy==NULL){
             connexionDAO::$connexionAnimeasy = new connexionDAO();
         }
         return connexionDAO::$connexionAnimeasy;
     }
}



