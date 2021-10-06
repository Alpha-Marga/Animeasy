<?php

include_once("$racine/modele/enfant.php");
include_once("$racine/modele/activite.php");
include_once("$racine/modele/activiteDAO.php");
include_once("$racine/modele/animateur.php");
include_once("$racine/modele/materiel.php");
include_once("$racine/modele/materielDAO.php");
include_once("$racine/modele/materielUtilise.php");
include_once("$racine/modele/materielUtiliseDAO.php");
include_once("$racine/modele/activiteAnime.php");
include_once("$racine/modele/activiteAnimeDAO.php");

// RECUPERATION DE L'ACTIVITE DU JOUR
$activitesJour = activiteAnimeDAO::chargerActiviteJour();

// RECUPERATION DES MATERIELS UTILISES PAR L'ACTIVITE DU JOUR
$materielsJour = materielUtiliseDAO::chargerMaterielsJour();

include("$racine/vue/entete.html.php");
include("$racine/vue/vueActiviteJour.php");
include("$racine/vue/pied.html.php");